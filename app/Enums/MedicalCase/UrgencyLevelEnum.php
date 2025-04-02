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

    /**
     * Get the Tailwind CSS classes for the urgency level badge
     *
     * @return string Tailwind CSS classes
     */
    public function color(): string
    {
        return match($this) {
            self::Low => 'bg-blue-100 text-blue-800',
            self::Medium => 'bg-yellow-100 text-yellow-800',
            self::High => 'bg-orange-100 text-orange-800',
            self::Urgent => 'bg-red-100 text-red-800',
        };
    }

    /**
     * Get the Spanish display name for the urgency level
     *
     * @return string The translated display name
     */
    public function toDisplayName(): string
    {
        return match($this) {
            self::Low => 'Baja',
            self::Medium => 'Media',
            self::High => 'Alta',
            self::Urgent => 'Urgente',
        };
    }
}