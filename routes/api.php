<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\TestimonyController;
use Illuminate\Support\Facades\Route;

/* Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum'); */


/* Route::post('/testimonys', [TestimonyController::class, 'store'])->name('testimonys.store'); */

Route::resource('testimonys', TestimonyController::class);
Route::resource('clients', ClientController::class);

/* Route::group(['middleware' => 'guest'], function() {
}); */