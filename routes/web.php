<?php

use App\Http\Controllers\TestimonyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home.index');


// Depoimentos
Route::resource('testimonies', TestimonyController::class);

// 