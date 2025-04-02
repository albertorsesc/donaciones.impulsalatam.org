<?php

namespace App\Enums\MedicalCase;

enum MedicalDocumentVerificationStatusEnum: string
{
    case Pending = 'pending';
    case Verified = 'verified';
    case Rejected = 'rejected';
}
