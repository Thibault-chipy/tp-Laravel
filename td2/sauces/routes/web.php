<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaucesController;

Route::get('/', [SaucesController::class, 'index'])->name('sauces.index');


Route::get("/sauces",[SaucesController::class, 'index'])->name("sauces.index");

Route::get("/sauces/show/{id}",[SaucesController::class, 'show'])->name("sauces.show");

Route::get("/sauces/create",[SaucesController::class, 'create'])->name("sauces.create");
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::post("/sauces/store",[SaucesController::class, 'store'])->name("sauces.store");