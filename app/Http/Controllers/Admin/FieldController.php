<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateFieldRequest;
use App\Models\Country;
use App\Models\Field;
use Illuminate\Http\Request;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fields = Field::orderBy('title')->paginate(100);

        return view('admin.fields.index', compact('fields'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::all();

        return view('admin.fields.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'string|max:1000',
            'amount' => 'numeric|min:0',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('fields', 'public');
            $request->merge(['image' => $imagePath]);
        }

        Field::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'amount' => $request->input('amount'),
            'image' => $request->input('image'),
        ]);

        return redirect()->route('admin.fields.index')->with('success', 'Field created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Field $field)
    {
        // return view('admin.fields.show', compact('field'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Field $field)
    {
        return view('admin.fields.edit', compact('field'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Field $field)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'string|max:1000',
            'amount' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        if ($request->hasFile('image')) {
            if ($field->image) {
                $oldImagePath = public_path('storage/' . $field->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $path = $request->file('image')->store('fields', 'public');
            $request->merge(['image' => $path]);
        }

        $field->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'amount' => $request->input('amount'),
            'image' => $request->input('image', $field->image),
        ]);

        return redirect()->route('admin.fields.index')->with('success', 'Field updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Field $field)
    {
        if ($field->image) {
            $imagePath = public_path('storage/' . $field->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $field->delete();

        return redirect()->route('admin.fields.index')->with('success', 'Field deleted successfully.');
    }
}
