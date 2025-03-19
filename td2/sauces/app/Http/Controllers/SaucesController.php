<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sauce;
class SaucesController extends Controller
{
    public function index(){
        $sauces = Sauce::all();
        return view(sauces.index,[]);
    }
}
