<?php

namespace App\Http\Requests;

use App\Enums\MedicalCase\MedicalCasePatientRelationEnum;
use App\Enums\MedicalCase\UrgencyLevelEnum;
use Illuminate\Foundation\Http\FormRequest;

class MedicalCaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'patient_relation' => ['required', 'string', 'in:'.implode(',', MedicalCasePatientRelationEnum::values())],
            'medical_condition' => ['required', 'string', 'max:255'],
            'urgency_level' => ['required', 'string', 'in:'.implode(',', UrgencyLevelEnum::values())],
            'total_estimated_cost' => ['required', 'numeric', 'min:0'],
            'total_donated_amount' => ['required', 'numeric', 'min:0'],
            'rejection_reason' => ['nullable', 'string'],
            'expired_at' => ['required', 'date', 'after:today'],
        ];
    }
}
