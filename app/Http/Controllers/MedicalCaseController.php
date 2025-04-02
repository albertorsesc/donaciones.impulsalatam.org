<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicalCaseRequest;
use App\Models\MedicalCase;
use Illuminate\Http\Response as IlluminateResponse;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;
use Symfony\Component\HttpFoundation\Response;

class MedicalCaseController extends Controller
{
    public function store(MedicalCaseRequest $request) : IlluminateResponse
    {
        if ($request->user()->cannot('store', MedicalCase::class)) {
            abort(403);
        }
        
        $medicalCase = MedicalCase::create($request->validated());
        
        return response()->view('medical-cases.show', [
            'medicalCase' => $medicalCase,
        ], Response::HTTP_CREATED);
    }
    
    public function show(MedicalCase $medicalCase) : IlluminateResponse
    {
        if (request()->user()->cannot('view', $medicalCase)) {
            abort(403);
        }
        
        return response()->view('medical-cases.show', [
            'medicalCase' => $medicalCase,
        ]);
    }
}
