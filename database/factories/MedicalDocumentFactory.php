<?php

namespace Database\Factories;

use App\Enums\MedicalCase\MedicalDocumentVerificationStatusEnum;
use App\Models\MedicalCase;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MedicalDocument>
 */
class MedicalDocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fileTypes = ['application/pdf', 'image/jpeg', 'image/png'];
        $fileName = $this->faker->uuid . '.' . $this->faker->randomElement(['pdf', 'jpg', 'png']);

        return [
            'medical_case_id' => MedicalCase::factory(),
            'file_path' => 'documents/' . $fileName,
            'file_name' => $fileName,
            'file_size' => $this->faker->numberBetween(1000, 20000000),
            'file_mime' => $this->faker->randomElement($fileTypes),
            'verification_status' => $this->faker->randomElement(MedicalDocumentVerificationStatusEnum::cases()),
            'verification_notes' => $this->faker->optional(0.3)->paragraph(),
            'is_public' => $this->faker->boolean(80),
        ];
    }
}
