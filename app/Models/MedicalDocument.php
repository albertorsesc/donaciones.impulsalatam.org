<?php

namespace App\Models;

use App\Enums\MedicalCase\MedicalDocumentVerificationStatusEnum;
use Database\Factories\MedicalDocumentFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MedicalDocument extends Model
{
    /** @use HasFactory<MedicalDocumentFactory> */
    use HasFactory;

    protected $fillable = [
        'medical_case_id',
        'file_path',
        'file_name',
        'file_size',
        'file_mime',
        'verification_status',
        'verification_notes',
        'is_public',
    ];

    protected $casts = [
        'is_public' => 'boolean',
        'file_size' => 'integer',
        'verification_status' => MedicalDocumentVerificationStatusEnum::class,
    ];

    /**
     * Get the medical case that owns the document
     */
    public function medicalCase(): BelongsTo
    {
        return $this->belongsTo(MedicalCase::class);
    }
}
