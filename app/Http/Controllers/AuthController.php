<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // login, logout, and register methods can be added here

    public function showLogin()
    {
        if (Auth::check()) {
            if (Auth::user()->isAdmin()) {
                return redirect()->route('admin.dashboard');
            } else if (Auth::user()->isClient()) {
                return redirect()->route('client.dashboard.profile');
            }
        }

        return view('client.login');
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|min:5',
            'password' => 'required|min:6',
        ]);

        $credentials = [
            'password' => $request->input('password'),
        ];

        $request->merge([
            'email' => str_replace(' ', '', $request->input('email')),
        ]);

        if (str_contains($request->input('email'), '@')) {
            $credentials['email'] = $request->input('email');
        } else {
            $credentials['email'] = $request->input('email') . '@gmail.com';
        }

        if (Auth::attempt($credentials)) {
            if (Auth::user()->isAdmin()) {
                return redirect()->route('admin.dashboard');
            } else if (Auth::user()->isClient()) {
                return redirect()->route('client.dashboard.profile');
            }
        }

        return back()->withErrors([
            'email' => __('messages.login_doesnt_match'),
        ]);
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

}
