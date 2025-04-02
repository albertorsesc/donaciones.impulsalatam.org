<?php

namespace App\Policies;

use App\Models\MedicalDocument;
use App\Models\User;
use App\Models\MedicalCase;
use Illuminate\Auth\Access\Response;

class MedicalDocumentPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true; // Everyone can view documents
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, MedicalDocument $medicalDocument): bool
    {
        return true; // Everyone can view individual documents as mentioned
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, MedicalCase $medicalCase = null): bool
    {
        // If no medical case is provided, default to false
        if (!$medicalCase) {
            return false;
        }

        // Only allow the requester of the medical case to add documents
        return $user->id === $medicalCase->requester_id;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, MedicalDocument $medicalDocument): bool
    {
        // Only the owner of the medical case can update documents
        return $user->id === $medicalDocument->medicalCase->requester_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, MedicalDocument $medicalDocument): bool
    {
        // Only the owner of the medical case can delete documents
        return $user->id === $medicalDocument->medicalCase->requester_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, MedicalDocument $medicalDocument): bool
    {
        // Only the owner of the medical case can restore documents
        return $user->id === $medicalDocument->medicalCase->requester_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, MedicalDocument $medicalDocument): bool
    {
        // Only the owner of the medical case can force delete documents
        return $user->id === $medicalDocument->medicalCase->requester_id;
    }
}