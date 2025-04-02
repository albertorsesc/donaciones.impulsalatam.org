<?php

namespace App\Enums\MedicalCase;

enum MedicalDocumentTypeEnum: string
{
    case Prescription = 'prescription';
    case Diagnosis = 'diagnosis';
    case MedicalReport = 'medical_report';
    case CostEstimate = 'cost_estimate';
    case Other = 'other';
}
