<?php

use App\Enums\MedicalCase\MedicalCaseStatusEnum;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('medical_cases', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'requester_id')->constrained('users')->cascadeOnDelete();
            $table->string('title');
            $table->text('description');
            $table->string('patient_relation');
            $table->string('medical_condition');
            $table->string('urgency_level');
            $table->decimal('total_estimated_cost', 10);
            $table->decimal('total_donated_amount', 10);
            $table->string('status')->default(MedicalCaseStatusEnum::PendingReview);
            $table->text('rejection_reason')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamp('expired_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_cases');
    }
};
