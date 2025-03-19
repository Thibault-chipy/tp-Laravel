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
        return view('client.index', [
            'clients' => Client::all()
        ]);
    }

    //toutes les methode CRUD

    public static function create() {
        return view('client.create');
    }

    public static function store(Request $request) {
    
    Client::create([
        'numeroClient' => $request->numeroClient,
        'nom' => $request->nom,
        'email' => $request->email,
        'carteBancaire' => $request->carteBancaire,
    ]);

    dd("client ajouté avec succès");
    return redirect()->route('client.index')->with('success', 'Client ajouté avec succès.');

    }

    public function show($numeroClient) {
        $client = Client::firstOrFail($numeroClient);  
        return view('client.show', compact('client'));
    }

    public function edit($id) {
        $client = Client::find($id);
        return route("client.edit" ,[
            'client' => $client
        ]);
    }

    public function update(Request $request, $id) {
        $client = Client::find($id);
        $client->nom = $request->nom;
        $client->prenom = $request->prenom;
        $client->email = $request->email;
        $client->telephone = $request->telephone;
        $client->save();
        return redirect('/client'); 
    }

     
}

