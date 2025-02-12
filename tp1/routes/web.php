<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientControleur;

Route::get('/', [ClientControleur::class, 'app']);


Route::get('/client', [ClientControleur::class, 'index']);

Route::get('/test',[ClientControleur::class, 'test']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
