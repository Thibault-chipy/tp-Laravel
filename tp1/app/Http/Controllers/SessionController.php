<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{

    public function show(string $id){
        return view("sessions", [
            "user" => Auth::user(),
        ]);
    }
}
