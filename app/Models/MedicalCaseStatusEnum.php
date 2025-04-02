<?php

namespace App\Models;

enum MedicalCaseStatusEnum: string
{
    case Draft = 'draft';
    case PendingReview = 'pending_review';
    case Active = 'active';
    case Completed = 'completed';
    case Rejected = 'rejected';
}
