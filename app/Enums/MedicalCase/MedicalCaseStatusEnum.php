<?php

namespace App\Enums\MedicalCase;

enum MedicalCaseStatusEnum: string
{
    case Draft = 'draft';
    case PendingReview = 'pending_review';
    case Active = 'active';
    case Completed = 'completed';
    case Rejected = 'rejected';
}
