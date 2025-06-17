<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Field;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function home()
    {
        $fields = Field::all();

        return view('client.index', compact('fields'));
    }

    public function contact()
    {
        return view('client.contact');
    }

}
