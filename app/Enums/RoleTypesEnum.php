<?php

namespace App\Enums;

enum RoleTypesEnum: string
{
    case Requester = 'requester';
    case Donor = 'donor';
    
    public static function values(): array
    {
        return [
            self::Requester->value,
            self::Donor->value,
        ];
    }
}
