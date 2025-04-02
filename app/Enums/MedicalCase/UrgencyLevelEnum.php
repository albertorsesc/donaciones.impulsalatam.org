<?php

namespace App\Enums\MedicalCase;

enum UrgencyLevelEnum: string
{
    case Low = 'low';
    case Medium = 'medium';
    case High = 'high';
    case Urgent = 'urgent';
    
    public static function values(): array
    {
        return [
            self::Low->value,
            self::Medium->value,
            self::High->value,
            self::Urgent->value,
        ];
    }
}
