<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Field;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function dashboard(Request $request)
    {

        $applications = $request->user()->applications()->get();

        return view('client.dashboard.index', compact('applications'));
    }

}
