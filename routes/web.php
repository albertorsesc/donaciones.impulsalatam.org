<?php

use App\Http\Controllers\MedicalCases\MedicalCaseController;
use App\Http\Controllers\MedicalCases\MedicalDocumentController;
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
        '/casos-medicos/{medicalCase}',
        [MedicalCaseController::class, 'show']
    )->name('medical-cases.show');

    // Medical Documents
    Route::post(
        '/medical-cases/{medicalCase}/documents',
        [MedicalDocumentController::class, 'store']
    )->name('medical-documents.store');

    Route::delete(
        '/medical-documents/{document}',
        [MedicalDocumentController::class, 'destroy']
    )->name('medical-documents.destroy');
});
