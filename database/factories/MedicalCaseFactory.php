<?php

namespace Database\Factories;

use App\Enums\MedicalCase\MedicalCasePatientRelationEnum;
use App\Enums\MedicalCase\MedicalCaseStatusEnum;
use App\Enums\MedicalCase\UrgencyLevelEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MedicalCase>
 */
class MedicalCaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'requester_id' => User::factory(),
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'patient_relation' => $this->faker->randomElement(MedicalCasePatientRelationEnum::cases()),
            'medical_condition' => $this->faker->sentence,
            'urgency_level' => $this->faker->randomElement(UrgencyLevelEnum::cases()),
            'total_estimated_cost' => $estimatedCost = $this->faker->randomFloat(2, 100, 1000000),
            'total_donated_amount' => $this->faker->randomFloat(2, 0, $estimatedCost),
            'status' => $this->faker->randomElement(MedicalCaseStatusEnum::cases()),
            'rejection_reason' => $this->faker->sentence,
            'completed_at' => $this->faker->optional()->dateTimeBetween('-1 month'),
            'expired_at' => $this->faker->dateTimeBetween('now', '+1 year'),
        ];
    }
}
