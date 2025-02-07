<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientControleur;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/client', [ClientControleur::class, 'show']);

Route::get('/test',[ClientControleur::class, 'test']);