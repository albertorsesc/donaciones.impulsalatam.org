<?php

namespace App\Http\Controllers\MedicalCases;

use App\Http\Controllers\Controller;
use App\Http\Requests\MedicalCaseRequest;
use App\Models\MedicalCase;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response as IlluminateResponse;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;
use Symfony\Component\HttpFoundation\Response;

class MedicalCaseController extends Controller
{
    public function create() : InertiaResponse
    {
        if (request()->user()->cannot('create', MedicalCase::class)) {
            abort(403);
        }

        return Inertia::render('MedicalCases/Create');
    }

    public function store(MedicalCaseRequest $request) : Response
    {
        if ($request->user()->cannot('store', MedicalCase::class)) {
            abort(403);
        }

        $medicalCase = MedicalCase::create($request->validated());

        return Inertia::location(route('medical-cases.show', $medicalCase));
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