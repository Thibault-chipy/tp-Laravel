<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaucesController;

Route::get('/', function () {
    return view('layouts.app');
});


Route::get("/sauces",[SaucesController::class, 'index'])->name("sauces.index");

Route::get("/sauces/show/{id}",[SaucesController::class, 'show'])->name("sauces.show");