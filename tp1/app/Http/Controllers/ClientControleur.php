<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientControleur extends Controller
{
    public static function show() {
        return view('client');
    }
}
