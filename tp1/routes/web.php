<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientControleur;
use App\Http\Controllers\SessionController;

Route::get('/', [ClientControleur::class, 'app']);


Route::get('/client', [ClientControleur::class, 'index']);

Route::get('/test',[ClientControleur::class, 'test']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/session/{id}', [SessionController::class, 'show'])->name('session.show');

Route::get('/client/create', [ClientControleur::class, 'create'])->name("client.create");

Route::post('/client/store', [ClientControleur::class, 'store'])->name("client.store");

Route::get('/client/{id}', [ClientControleur::class, 'show'])->name("client.show");