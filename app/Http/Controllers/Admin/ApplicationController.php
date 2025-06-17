<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Country;
use App\Models\Field;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all applications
        $applications = Application::paginate(100);
        // Return the view with applications data
        return view('admin.applications.index', compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fields = Field::all();
        $clients = User::all();
        $countries = Country::all();

        return view('admin.applications.create', compact('fields', 'clients', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'client_id' => 'required|exists:users,id',
            'country_id' => 'required|exists:countries,id',
            'field_id' => 'required|exists:fields,id',
            'amount' => 'nullable|numeric|min:0',
            'status' => 'required|string|in:pending,approved,rejected',
            'comment' => 'nullable|string|max:255',
        ]);

        Application::create([
            'user_id' => $request->client_id,
            'country_id' => $request->country_id,
            'field_id' => $request->field_id,
            'amount' => $request->amount,
            'status' => $request->status,
            'comment' => $request->comment,
        ]);

        return redirect()->route('admin.applications.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        return view('admin.applications.show', compact('application'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        $fields = Field::all();
        $clients = User::all();
        $countries = Country::all();

        return view('admin.applications.edit', compact('application', 'fields', 'clients', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Application $application)
    {
        $request->validate([
            'client_id' => 'required|exists:users,id',
            'field_id' => 'required|exists:fields,id',
            'status' => 'required|string|in:pending,approved,rejected',
            'comment' => 'nullable|string',
            'document' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        if ($request->hasFile('document')) {
            if ($application->document) {
                Storage::disk('public')->delete($application->document);
            }

            $document = $request->file('document');

            $path = $document->store('documents', 'public');

            $request->merge([
                'document' => $path,
            ]);
        }

        // Update the application and user details
        $application->update([
            'user_id' => $request->client_id,
            'field_id' => $request->field_id,
            'status' => $request->status,
            'comment' => $request->input('comment', $application->comment),
            'document' => $request->input('document', $application->document),
        ]);

        return redirect()->route('admin.applications.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        if ($application->document) {
            Storage::disk('public')->delete($application->document);
        }

        $application->delete();

        return redirect()->route('admin.applications.index');
    }


}
