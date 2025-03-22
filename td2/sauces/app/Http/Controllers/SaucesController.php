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

    public function create(){
        return view("sauces.create");
    }

    public function store(Request $request) {
             if ($request->file('image')) {
            $path = $request->file('image')->store('sauces', 'public');
            $imageUrl = 'storage/' . $path;
        } else {
            $imageUrl = 'storage/sauces/default.jpg';
        }
        $sauce = new Sauce();
        $sauce->name = $request->name;
        $sauce->manufacturer = $request->manufacturer;
        $sauce->description = $request->description;
        $sauce->mainPepper = $request->piment;
        $sauce->heat = $request->heat;
        $sauce->imageUrl = $imageUrl;
        $sauce->user_Id = $request->userId;

        $sauce->save();

        return redirect()->route('sauces.index')->with('success', 'Sauce ajoutée avec succès');
    }

}
