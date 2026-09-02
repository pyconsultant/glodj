<?php

namespace App\Policies;

use App\Models\User;
use App\Enums\UserRole;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
/**
     * Accorde automatiquement tous les droits à l'administrateur.
     */
    public function before(User $user, string $ability): ?bool
    {
        if ($user->hasRole(UserRole::ADMINISTRATEUR)) {
            return true;
        }

        return false; // Interdit l'accès à la gestion des users pour tous les autres
    }

    public function viewAny(User $user): bool
    {
        return false;
    }

    public function view(User $user, User $model): bool
    {
        return false;
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, User $model): bool
    {
        return false;
    }

    public function delete(User $user, User $model): bool
    {
        return false;
    }

}
