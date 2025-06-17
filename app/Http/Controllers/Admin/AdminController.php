<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Country;
use App\Models\Field;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Str;
use League\Csv\Reader;
use League\Csv\Statement;
use Nette\Utils\Random;

use function PHPUnit\Framework\isEmpty;

class AdminController extends Controller
{
    public function dashboard()
    {
        if (Auth::check()) {
            if (Auth::user()->isAdmin()) {
                $clients = User::all()->where('role', 'client');
                $paymentsAmount = Payment::sum('amount');

                return view('admin.dashboard', compact('clients', 'paymentsAmount'));
            } elseif (Auth::user()->isClient()) {
                return view('client.dashboard.index');
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function importApplications()
    {
        $records = [];

        return view('admin.applications.import', compact('records'));
    }

    public function importApplicationsFromCSV(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv',
        ]);

        $file = $request->file('csv_file');

        $csv = Reader::createFromPath($file->getRealPath(), 'r');
        $csv->setHeaderOffset(0);

        $records = $csv->getRecords();
        $records = iterator_to_array($records);

        // name, payment_amount, payment_date, phone_1, phone_2,
        // outstanding_amount,outstanding_payment_date, birthday,
        // passport, field, field_amount, country, email

        $records = array_filter($records, function ($record) {
            return !empty($record['name']);
        });

        foreach ($records as $record) {
            // Field 
            if (!empty(trim($record['field']))) {
                $field = Field::whereLike('title', trim($record['field']))->first();

                if (!$field) {
                    $field = Field::create(['title' => ucfirst(trim($record['field']))]);
                }
            }
            // Country
            if (!empty(trim($record['country']))) {
                $country = Country::whereLike('name', trim($record['country']))->first();
                if (!$country) {
                    $country = Country::create(['name' => ucfirst(trim($record['country']))]);
                }
            }

            $user = null;

            if (!empty($record['email'])) {
                $user = User::where('email', trim($record['email']))->first();
            }

            if (!$user) {
                $user = User::where('name', trim($record['name']))->first();
            }

            if (!$user) {
                $email = $this->generateEmail($record);

                $user = User::create([
                    'name' => trim($record['name']),
                    'email' => $email,
                    'phone' => trim($record['phone_1']) ?? null,
                    'phone_2' => trim($record['phone_2']) ?? null,
                    'passport' => trim($record['passport']) ?? null,
                    'birthday' => isset($record['birthday']) ? date('Y-m-d', strtotime($record['birthday'])) : null,
                    'password' => bcrypt($this->generatePassword()),
                ]);
            }

            $hasApplication = Application::where('user_id', $user->id)
                ->where('field_id', $field->id)
                ->where('country_id', $country->id)
                ->first();

            if (!$hasApplication) {
                $application = Application::create([
                    'user_id' => $user->id,
                    'field_id' => $field->id,
                    'country_id' => $country->id,
                ]);

                if (!empty($record['payment_amount'])) {
                    $payment = Payment::create([
                        'application_id' => $application->id,
                        'amount' => $record['payment_amount'] ?? 0,
                        'comment' => $record['payment_date'] ?? null,
                    ]);
                }

                if (!empty($record['outstanding_amount'])) {
                    $outstandingPayment = Payment::create([
                        'application_id' => $application->id,
                        'amount' => trim($record['outstanding_amount']),
                        'comment' => $record['outstanding_payment_date'] ?? null,
                    ]);
                }
            }



        }

        return view('admin.applications.import', compact('records'));
    }


    public function generateEmail($record): string
    {

        if (!empty($record['email'])) {

            if (Str::contains($record['email'], '@')) {
                return $record['email'];
            } else {
                $email = strtolower(trim($record['email']));
                $email = preg_replace('/\s+/', '.', $email);
                return $email . '@gmail.com';
            }
        } else if (!empty($record['passport'])) {
            $email = strtolower(trim($record['passport']));
            $email = preg_replace('/\s+/', '.', $email);
            return $email . '@gmail.com';
        } else {
            $name1 = (explode(' ', $record['name']))[0] ?? '';
            $name1 .= Random::generate(5, '0-9');
            $name1 = strtolower(trim($name1));
            $name1 = preg_replace('/\s+/', '.', $name1);

            return $name1 . '@gmail.com';
        }
    }

    public function generatePassword(): string
    {
        $length = 8;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }

    public function similarity($str1, $str2): float
    {
        similar_text($str1, $str2, $percent);
        return $percent;
    }
}
