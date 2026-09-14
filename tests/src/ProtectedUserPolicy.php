<?php

declare(strict_types=1);

namespace TomatoPHP\FilamentUsers\Tests;

use TomatoPHP\FilamentUsers\Tests\Models\User;

/**
 * Test policy that protects the user with the email protected@example.com.
 */
class ProtectedUserPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, User $model): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, User $model): bool
    {
        return $model->email !== 'protected@example.com';
    }

    public function delete(User $user, User $model): bool
    {
        return $model->email !== 'protected@example.com';
    }

    public function deleteAny(User $user): bool
    {
        return true;
    }
}
