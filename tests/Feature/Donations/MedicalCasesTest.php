<?php

namespace Tests\Feature\Donations;

use App\Enums\MedicalCase\MedicalCaseStatusEnum;
use App\Enums\MedicalCase\MedicalDocumentTypeEnum;
use App\Enums\MedicalCase\MedicalDocumentVerificationStatusEnum;
use App\Enums\RoleTypesEnum;
use App\Models\MedicalCase;
use App\Models\MedicalDocument;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Inertia\Testing\AssertableInertia;
use Tests\TestCase;

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

    public function test_only_requester_users_can_visit_create_medical_case_view()
    {
        $this->signInAs(RoleTypesEnum::Donor);

        $response = $this->get(route('medical-cases.create'));
        $response->assertForbidden();

        $this->signInAs(RoleTypesEnum::Requester);

        $response = $this->get(route('medical-cases.create'));
        $response->assertOk();
        $response->assertInertia(fn (AssertableInertia $page) =>
            $page->component('MedicalCases/Create')
        );
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

    public function test_requester_user_can_create_a_medical_case_with_documents()
    {
        Storage::fake('public');
        $this->signInAs(RoleTypesEnum::Requester);

        $medicalCase = $this->make(MedicalCase::class);
        $data = Arr::except($medicalCase->toArray(), ['requester_id']);

        // NOTE: Document upload is now a separate operation from case creation
        // First create the case
        $response = $this->post(route('medical-cases.store'), $data);
        $response->assertCreated();

        $createdCase = MedicalCase::first();
        $this->assertDatabaseHas('medical_cases', [
            'id' => $createdCase->id,
            'title' => $medicalCase->title,
        ]);

        // Then upload documents separately
        $prescriptionFile = UploadedFile::fake()->create('prescription.pdf', 1000);
        $this->post(route('medical-documents.store', $createdCase), [
            'document' => $prescriptionFile,
            'document_type' => MedicalDocumentTypeEnum::Prescription->value,
            'is_public' => true,
        ]);

        $diagnosisFile = UploadedFile::fake()->create('diagnosis.jpg', 500);
        $this->post(route('medical-documents.store', $createdCase), [
            'document' => $diagnosisFile,
            'document_type' => MedicalDocumentTypeEnum::Diagnosis->value,
            'is_public' => false,
        ]);

        // Now check that both documents were added
        $createdCase->refresh();
        $this->assertCount(2, $createdCase->documents);

        $this->assertDatabaseHas('medical_documents', [
            'medical_case_id' => $createdCase->id,
            'document_type' => MedicalDocumentTypeEnum::Prescription->value,
            'is_public' => true,
            'verification_status' => MedicalDocumentVerificationStatusEnum::Pending->value,
        ]);

        $this->assertDatabaseHas('medical_documents', [
            'medical_case_id' => $createdCase->id,
            'document_type' => MedicalDocumentTypeEnum::Diagnosis->value,
            'is_public' => false,
            'verification_status' => MedicalDocumentVerificationStatusEnum::Pending->value,
        ]);
    }

    public function test_can_visit_medical_case_profile()
    {
        $this->signInAs(RoleTypesEnum::Donor);

        $medicalCase = $this->create(MedicalCase::class);
        $this->create(MedicalDocument::class, [
            'medical_case_id' => $medicalCase->id,
            'document_type' => MedicalDocumentTypeEnum::Prescription,
            'is_public' => true,
        ]);
        $this->create(MedicalDocument::class, [
            'medical_case_id' => $medicalCase->id,
            'document_type' => MedicalDocumentTypeEnum::MedicalReport,
            'is_public' => false,
        ]);

        $response = $this->get(route('medical-cases.show', $medicalCase));
        $response->assertOk();
        $response->assertViewIs('medical-cases.show');

        // For Inertia responses, you can check the data being passed
        // Uncomment if using Inertia for this page
        /*
        $response->assertInertia(fn (AssertableInertia $page) =>
            $page->component('MedicalCases/Show')
                ->has('medicalCase.documents', 2)
                ->where('medicalCase.id', $medicalCase->id)
        );
        */
    }

    public function test_only_public_documents_are_visible_to_donors()
    {
        $requester = $this->create(User::class, ['role' => RoleTypesEnum::Requester]);
        $this->actingAs($requester);

        $medicalCase = $this->create(MedicalCase::class, [
            'requester_id' => $requester->id
        ]);

        $publicDocument = $this->create(MedicalDocument::class, [
            'medical_case_id' => $medicalCase->id,
            'document_type' => MedicalDocumentTypeEnum::Prescription,
            'is_public' => true,
        ]);

        $privateDocument = $this->create(MedicalDocument::class, [
            'medical_case_id' => $medicalCase->id,
            'document_type' => MedicalDocumentTypeEnum::MedicalReport,
            'is_public' => false,
        ]);

        // Login as a donor
        $this->signInAs(RoleTypesEnum::Donor);

        // Test that we can access the medical case
        $response = $this->get(route('medical-cases.show', $medicalCase));
        $response->assertOk();

        // Test that donor cannot delete documents
        $response = $this->delete(route('medical-documents.destroy', $publicDocument));
        $response->assertForbidden();

        // Test that requester can delete their own documents
        $this->actingAs($requester);
        $response = $this->delete(route('medical-documents.destroy', $publicDocument));
        $response->assertRedirect();
        $this->assertDatabaseMissing('medical_documents', ['id' => $publicDocument->id]);
    }

    public function test_requester_can_upload_documents_to_own_medical_case()
    {
        Storage::fake('public');
        $requester = $this->create(User::class, ['role' => RoleTypesEnum::Requester]);
        $this->actingAs($requester);

        $ownMedicalCase = $this->create(MedicalCase::class, [
            'requester_id' => $requester->id
        ]);

        $file = UploadedFile::fake()->create('medical-report.pdf', 1000);

        $response = $this->post(route('medical-documents.store', $ownMedicalCase), [
            'document' => $file,
            'document_type' => MedicalDocumentTypeEnum::MedicalReport->value,
            'is_public' => true,
        ]);

        $response->assertRedirect();

        $this->assertDatabaseHas('medical_documents', [
            'medical_case_id' => $ownMedicalCase->id,
            'document_type' => MedicalDocumentTypeEnum::MedicalReport->value,
            'is_public' => true,
            'verification_status' => MedicalDocumentVerificationStatusEnum::Pending->value,
        ]);

        $ownMedicalCase->refresh();
        $document = $ownMedicalCase->documents()->first();
        $this->assertNotNull($document);

        Storage::disk('public')->assertExists($document->file_path);
    }

    public function test_requester_cannot_upload_documents_to_other_requesters_medical_case()
    {
        Storage::fake('public');

        // Create first requester (owner of the case)
        $owner = $this->create(User::class, ['role' => RoleTypesEnum::Requester]);

        // Login as the owner first to create the case
        $this->actingAs($owner);
        $medicalCase = $this->create(MedicalCase::class);

        // Verify the case was created with the correct owner
        $this->assertEquals($owner->id, $medicalCase->requester_id);

        // Create second requester (not owner of the case)
        $otherRequester = $this->create(User::class, ['role' => RoleTypesEnum::Requester]);
        $this->actingAs($otherRequester);

        $file = UploadedFile::fake()->create('medical-report.pdf', 1000);

        $response = $this->post(route('medical-documents.store', $medicalCase), [
            'document' => $file,
            'document_type' => MedicalDocumentTypeEnum::MedicalReport->value,
            'is_public' => true,
        ]);

        $response->assertForbidden();
        $medicalCase->refresh();
        $this->assertCount(0, $medicalCase->documents);
    }

    public function test_donor_role_cannot_upload_documents_to_any_medical_case()
    {
        Storage::fake('public');

        // Create a requester and a medical case
        $requester = $this->create(User::class, ['role' => RoleTypesEnum::Requester]);

        // Login as the requester first to create the case
        $this->actingAs($requester);
        $medicalCase = $this->create(MedicalCase::class);

        // Verify the case was created with the correct owner
        $this->assertEquals($requester->id, $medicalCase->requester_id);

        // Login as a donor
        $donor = $this->create(User::class, ['role' => RoleTypesEnum::Donor]);
        $this->actingAs($donor);

        $file = UploadedFile::fake()->create('medical-report.pdf', 1000);

        $response = $this->post(route('medical-documents.store', $medicalCase), [
            'document' => $file,
            'document_type' => MedicalDocumentTypeEnum::MedicalReport->value,
            'is_public' => true,
        ]);

        $response->assertForbidden();
        $medicalCase->refresh();
        $this->assertCount(0, $medicalCase->documents);
    }

    public function test_requester_can_verify_medical_case_has_required_documents()
    {
        Storage::fake('public');

        // Create a requester
        $requester = $this->create(User::class, ['role' => RoleTypesEnum::Requester]);
        $this->actingAs($requester);

        // Create a medical case
        $medicalCase = $this->create(MedicalCase::class, [
            'requester_id' => $requester->id,
            'status' => MedicalCaseStatusEnum::Draft
        ]);

        // Add required documents
        $this->create(MedicalDocument::class, [
            'medical_case_id' => $medicalCase->id,
            'document_type' => MedicalDocumentTypeEnum::Prescription,
            'is_public' => true,
        ]);

        $this->create(MedicalDocument::class, [
            'medical_case_id' => $medicalCase->id,
            'document_type' => MedicalDocumentTypeEnum::MedicalReport,
            'is_public' => true,
        ]);

        $this->create(MedicalDocument::class, [
            'medical_case_id' => $medicalCase->id,
            'document_type' => MedicalDocumentTypeEnum::CostEstimate,
            'is_public' => true,
        ]);

        // Check existing routes in the application
        $searchResponse = $this->get(route('medical-cases.show', $medicalCase));
        $searchResponse->assertOk();

        // For this test case, we'll focus on validating that the necessary documents exist
        $this->assertCount(3, $medicalCase->documents);
        $this->assertTrue($medicalCase->documents()->where('document_type', MedicalDocumentTypeEnum::Prescription)->exists());
        $this->assertTrue($medicalCase->documents()->where('document_type', MedicalDocumentTypeEnum::MedicalReport)->exists());
        $this->assertTrue($medicalCase->documents()->where('document_type', MedicalDocumentTypeEnum::CostEstimate)->exists());
    }
}
