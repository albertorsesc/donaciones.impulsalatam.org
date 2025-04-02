<?php

namespace Tests;

use App\Enums\RoleTypesEnum;
use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    public function signInAs(RoleTypesEnum $role): void
    {
        $this->actingAs(
            $this->create(User::class, ['role' => $role])
        );
    }

    public function create(string $model, array $attributes = []): mixed
    {
        return $model::factory()->create($attributes);
    }

    public function make(string $model, array $attributes = []): mixed
    {
        return $model::factory()->make($attributes);
    }
}
