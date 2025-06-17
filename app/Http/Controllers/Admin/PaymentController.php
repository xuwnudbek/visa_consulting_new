<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all applications with payments
        $applications = Application::paginate(100);
        $payments = Payment::orderBy('created_at', 'desc')->paginate(15);

        // Return the view with applications data
        return view('admin.payments.index', compact('applications', 'payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'application_id' => 'required|exists:applications,id',
            'amount' => 'required|numeric|min:0',
            'type' => 'required|string|in:cash,card,bank_transfer',
        ]);


        // Create a new payment
        $payment = Payment::create([
            'application_id' => $request->input('application_id'),
            'amount' => $request->input('amount', 0),
            'payment_type' => $request->input('type'),
        ]);

        return redirect()->route('admin.payments.show', $payment->application_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $application = Application::findOrFail($id);
        $payments = $application->payments()->orderBy('created_at', 'desc')->paginate(15);

        return view('admin.payments.show', compact('application', 'payments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $payment = Payment::findOrFail($id);

        $payment->delete();

        // Redirect back to the payments index
        return redirect()->route('admin.payments.index')->with('success', 'Payment deleted successfully.');
    }

}
