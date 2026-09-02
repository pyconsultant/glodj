<?php

namespace App\Policies;

use App\Models\Candidat;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use App\Enums\UserRole;


class CandidatPolicy
{
    /**
     * S'exécute avant toutes les autres vérifications.
     */
    public function before(User $user, string $ability): ?bool
    {
        if ($user->hasRole(UserRole::ADMINISTRATEUR)) {
            return true; // Accorde TOUTES les autorisations à l'Admin d'un coup
        }

        return null; // Laisse les autres méthodes (view, update...) décider pour les non-admins
    }


    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
    // L'administrateur DOIT pouvoir voir la liste dans le panel Admin
    return (bool) $user->hasRole(UserRole::ADMINISTRATEUR);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Candidat $candidat): bool
    {
    // L'administrateur peut tout voir
        if ($user->is_admin) { // Ou selon la méthode que tu utilises pour vérifier le rôle Admin
            return true;
        }

        // Le candidat ne peut voir QUE son propre dossier
        return $user->id === $candidat->user_id; 
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Candidat $candidat): bool
    {
        if ($user->is_admin) {
            return true;
        }
        return $user->id === $candidat->user_id;
//    return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Candidat $candidat): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Candidat $candidat): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Candidat $candidat): bool
    {
        return false;
    }
}
