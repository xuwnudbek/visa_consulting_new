<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = User::paginate(100);
        return view('admin.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'nullable|string|max:20',
            'passport' => 'nullable|string|max:50',
            'birthday' => 'nullable|date',
            'password' => 'required|string|min:8',
            'role' => 'required|in:admin,client',
        ]);

        $request->merge(['password' => bcrypt($request->password)]);

        User::create($request->all());

        return redirect()->route('admin.clients.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $client = User::findOrFail($id);
        return view('admin.clients.show', compact('client'));
    }

    public function edit(string $id)
    {
        $client = User::findOrFail($id);
        return view('admin.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'phone' => 'nullable|string|max:20',
            'passport' => 'nullable|string|max:50',
            'birthday' => 'nullable|date',
            'role' => 'required|in:admin,client',
        ]);

        if ($request->has('password')) {
            $request->validate(['password' => 'nullable|string|min:8']);
            $request->merge(['password' => bcrypt($request->password)]);
        }


        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('admin.clients.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = User::findOrFail($id);
        $client->delete();
        return redirect()->route('admin.clients.index');
    }
}
