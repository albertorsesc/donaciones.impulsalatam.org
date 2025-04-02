<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalCase extends Model
{
    use HasFactory;

    protected $fillable = [
        'requester_id',
        'title',
        'description',
        'patient_relation',
        'medical_condition',
        'urgency_level',
        'total_estimated_cost',
        'total_donated_amount',
        'status',
        'rejection_reason',
        'completed_at',
        'expired_at',
    ];

    protected $casts = [
        'urgency_level' => UrgencyLevelEnum::class,
        'patient_relation' => MedicalCasePatientRelationEnum::class,
        'status' => MedicalCaseStatusEnum::class,
        'completed_at' => 'datetime',
        'expired_at' => 'datetime',
    ];

    protected static function boot(): void
    {
        parent::boot();
        static::creating(function (MedicalCase $medicalCase) {
            $medicalCase->requester_id = auth()->id();
        });
    }
}
