<?php

use App\Http\Controllers\ActivateDisableController;
use App\Http\Controllers\ClientProveSocialController;
use App\Http\Controllers\CompanyInfoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TestimonyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\web_page\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('index');
 
Route::prefix('dashboard')->middleware('auth')->group(function () {
    
    Route::get('/', HomeController::class)->name('home');
    
    // Depoimentos
    Route::resource('testimonies', TestimonyController::class);
    
    
    // Informações da empresa
    Route::resource('company_infos', CompanyInfoController::class)->except(['show']);
    
    // Clientes Renomados
    Route::resource('client_prove_socials', ClientProveSocialController::class);
    
    
    // Visitors - Visitantes
    Route::resource('visitors', VisitorController::class)->except(['create', 'edit', 'update']);
    
    // FAQ Perguntas frequentes
    Route::resource('questions', QuestionController::class);
    
    // Assuntos / Subjects
    Route::resource('subjects', SubjectController::class)->except(['show']);
    
    // Messages
    Route::resource('messages', MessageController::class)->only(['show', 'destroy']);

    // Users
    Route::resource('users', UserController::class)->only(['index', 'show', 'edit', 'update', 'destroy']);
    
    // Activar ou Desabilitar Recurso
    Route::put('/activate', [ActivateDisableController::class, 'activate'])->name('active');
    Route::put('/disable', [ActivateDisableController::class, 'disable'])->name('disable');

    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
