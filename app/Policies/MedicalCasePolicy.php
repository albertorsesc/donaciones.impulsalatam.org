<?php

namespace App\Policies;

use App\Enums\RoleTypesEnum;
use App\Models\MedicalCase;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class MedicalCasePolicy
{
    public function before(User $user, string $ability): bool|null
    {
        if ($user->isRoot()) {
            return true;
        }
        
        return null;
    }
    
    public function index(User $user) : bool
    {
        return $user->role === RoleTypesEnum::Requester;
    }
    
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, MedicalCase $medicalCase): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role === RoleTypesEnum::Requester;
    }
    
    public function store(User $user): bool
    {
        return $user->role === RoleTypesEnum::Requester;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, MedicalCase $medicalCase): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, MedicalCase $medicalCase): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, MedicalCase $medicalCase): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, MedicalCase $medicalCase): bool
    {
        return false;
    }
}
