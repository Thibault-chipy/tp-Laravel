<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sauce;
class SaucesController extends Controller
{
    public function index(){
        $sauces = Sauce::all();
        return view('sauces.index',["sauces" =>$sauces]);
    }

    public function show($id){
        $sauce = Sauce::find($id);
        
        return view("sauces.show",['sauce'=>$sauce]);
    }

}
