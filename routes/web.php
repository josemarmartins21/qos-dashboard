<?php

use App\Http\Controllers\ActivateDisableController;
use App\Http\Controllers\ClientProveSocialController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TestimonyController;
use App\Http\Controllers\VisitorController;
use App\Models\Subject;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::get('/test', function() {
    $subjects = Subject::all();
    return view('welcome', compact('subjects'))->name('test');
});

// Depoimentos
Route::resource('testimonies', TestimonyController::class);

// Clientes Renomados
Route::resource('client_prove_socials', ClientProveSocialController::class);


// Visitors - Visitantes
Route::resource('visitors', VisitorController::class);

// FAQ Perguntas frequentes
Route::resource('questions', QuestionController::class);

// Assuntos / Subjects
Route::resource('subjects', SubjectController::class);

// Messages
Route::resource('messages', MessageController::class)->only(['show', 'destroy']);
// Activar ou Desabilitar Recurso
Route::put('/activate', [ActivateDisableController::class, 'activate'])->name('active');
Route::put('/disable', [ActivateDisableController::class, 'disable'])->name('disable');