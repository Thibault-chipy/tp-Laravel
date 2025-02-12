<?php

namespace App\Http\Controllers;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientControleur extends Controller
{

    public static function app() {
        return view('layouts.app');
    }
    
    public static function index() {
        return view('client', [


            'clients' =>Client::all()
        
        
        ]);
    }
}

