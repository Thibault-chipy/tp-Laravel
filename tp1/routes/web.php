<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientControleur;
use App\Http\Controllers\SessionController;

/*
Route::get('/', [ClientControleur::class, 'app']);

Route::get('/test',[ClientControleur::class, 'test']);
*/
Auth::routes(); 

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/session/{numeroClient}', [SessionController::class, 'show'])->name('session.show');


//Routes pour méthodes CRUD Client
//Route::ressource('client', ClientControleur::class);

Route::get("/", [ClientControleur::class, 'index'])->name("client.index");
Route::get('/client/create', [ClientControleur::class, 'create'])->name("client.create");

Route::post('/client/store', [ClientControleur::class, 'store'])->name("client.store");

Route::get('/client/{numeroClient}', [ClientControleur::class, 'show'])->name("client.show");
Route::get('/client/{numeroClient}/edit', [ClientControleur::class, 'edit'])->name("client.edit");
Route::delete("/client/{numeroClient}",[ClientControleur::class,'destroy'])->name("client.destroy");

