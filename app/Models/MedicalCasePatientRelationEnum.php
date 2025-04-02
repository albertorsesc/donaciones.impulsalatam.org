<?php

namespace App\Models;

enum MedicalCasePatientRelationEnum: string
{
    case Self = 'self';
    case Family = 'family';
    case Friend = 'friend';
    case Other = 'other';
    
    public static function values() : array
    {
        return [
            self::Self->value,
            self::Family->value,
            self::Friend->value,
            self::Other->value,
        ];
    }
}
