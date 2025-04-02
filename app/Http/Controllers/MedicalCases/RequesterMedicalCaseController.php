<?php

namespace App\Http\Controllers\MedicalCases;

use App\Http\Controllers\Controller;
use App\Models\MedicalCase;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class RequesterMedicalCaseController extends Controller
{
    /**
     * @throws AuthorizationException
     */
    public function index() : Response
    {
        $this->authorize('index', MedicalCase::class);
        
        return Inertia::render('MedicalCases/Requester/Index', [
            'medicalCases' => MedicalCase::query()->whereRequesterId(auth()->id())->get()
        ]);
    }
}
