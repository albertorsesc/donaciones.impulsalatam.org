<?php

use App\Http\Controllers\MedicalCaseController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return view('landing.welcome');
});

Route::get('/acerca-de', function () {
    return view('landing.about');
})->name('about');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    
    // Medical Cases
    Route::get(
        '/casos-medicos/crear',
        [MedicalCaseController::class, 'create']
    )->name('medical-cases.create');
    
    Route::post(
        '/medical-cases',
        [MedicalCaseController::class, 'store']
    )->name('medical-cases.store');
    
    Route::get(
        '/explorar-casos/{medicalCase}',
        [MedicalCaseController::class, 'show']
    )->name('medical-cases.show');
});
