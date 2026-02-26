<?php

use App\Http\Controllers\ClientAndSocialProveController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClientProveSocialController;
use App\Http\Controllers\ClientTestimonyController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\TestimonyController;
use Illuminate\Support\Facades\Route;

/* Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum'); */


/* Route::post('/testimonys', [TestimonyController::class, 'store'])->name('testimonys.store'); */

Route::resource('testimonys', TestimonyController::class);
Route::resource('clients', ClientController::class);
Route::resource('client_prove_socials', ClientProveSocialController::class);


Route::resource('questions', QuestionController::class);

/* Route::post('/clientes-depoimentos', ClientTestimonyController::class); */
