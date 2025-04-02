<?php

namespace Tests\Feature\Donations;

use App\Enums\RoleTypesEnum;
use App\Models\MedicalCase;
use App\Models\MedicalCaseStatusEnum;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Arr;
use Tests\TestCase;
use Throwable;

class MedicalCasesTest extends TestCase
{
    use RefreshDatabase;

    public function test_only_requester_users_can_create_medical_case()
    {
        $this->signInAs(RoleTypesEnum::Donor);

        $response = $this->post(
            route('medical-cases.store'),
            $this->make(MedicalCase::class)->toArray()
        );
        $response->assertStatus(403); // Forbidden
    }

    public function test_requester_user_can_create_a_medical_case()
    {
        $this->signInAs(RoleTypesEnum::Requester);

        $medicalCase = $this->make(MedicalCase::class);
        $data = Arr::except($medicalCase->toArray(), ['requester_id']);

        $response = $this->post(route('medical-cases.store'), $data);
        $response->assertCreated();

        $createdCase = MedicalCase::first();

        $this->assertDatabaseHas('medical_cases', [
            'id' => $createdCase->id,
            'title' => $medicalCase->title,
            'description' => $medicalCase->description,
            'patient_relation' => $medicalCase->patient_relation,
            'medical_condition' => $medicalCase->medical_condition,
            'urgency_level' => $medicalCase->urgency_level,
            'total_estimated_cost' => $medicalCase->total_estimated_cost,
            'total_donated_amount' => $medicalCase->total_donated_amount,
            'status' => MedicalCaseStatusEnum::PendingReview,
            'rejection_reason' => $medicalCase->rejection_reason,
            'expired_at' => $createdCase->getAttributes()['expired_at'],
        ]);
    }

    public function test_can_visit_medical_case_profile()
    {
        $this->signInAs(RoleTypesEnum::Donor);

        $medicalCase = $this->create(MedicalCase::class);

        $response = $this->get(route('medical-cases.show', $medicalCase));
        $response->assertOk();
        $response->assertViewIs('medical-cases.show');
    }
}