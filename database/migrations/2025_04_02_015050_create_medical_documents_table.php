<?php

use App\Enums\MedicalCase\MedicalDocumentVerificationStatusEnum;
use App\Models\MedicalCase;
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
        Schema::create('medical_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(MedicalCase::class)->constrained()->cascadeOnDelete();
            $table->string('document_type');
            $table->string('file_path');
            $table->string('file_name');
            $table->integer('file_size');
            $table->string('file_mime', 100);
            $table->string('verification_status')->default(MedicalDocumentVerificationStatusEnum::Pending);
            $table->text('verification_notes')->nullable();
            $table->boolean('is_public')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_documents');
    }
};
