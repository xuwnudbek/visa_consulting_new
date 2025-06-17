<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all countries from the database
        $countries = Country::paginate(100);

        // Return the view with the list of countries
        return view('admin.countries.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return the view to create a new country
        return view('admin.countries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Create a new country instance and save it to the database
        Country::create($request->only('name'));

        // Redirect back to the countries index with a success message
        return redirect()->route('admin.countries.index')->with('success', 'Country created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Find the country by ID
        $country = Country::findOrFail($id);

        // Return the view to edit the country
        return view('admin.countries.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the country by ID
        $country = Country::findOrFail($id);

        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Update the country instance and save it to the database
        $country->update($request->only('name'));

        // Redirect back to the countries index with a success message
        return redirect()->route('admin.countries.index')->with('success', 'Country updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the country by ID
        $country = Country::findOrFail($id);

        // Delete the country from the database
        $country->delete();

        // Redirect back to the countries index with a success message
        return redirect()->route('admin.countries.index')->with('success', 'Country deleted successfully.');
    }
}
