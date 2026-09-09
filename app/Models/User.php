<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

// 1. On importe l'interface de Filament (le "contrat")
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Enums\UserRole;
use Illuminate\Database\Eloquent\Casts\Attribute;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]

class User extends Authenticatable implements FilamentUser,MustVerifyEmail
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_mask'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];    
    /*
     * Vérifie si l'utilisateur possède un rôle spécifique
     */
    public function hasRole(UserRole $role): bool
    {
//        return ($this->roles_mask & $role->value) === $role->value;
        return ($this->roles & $role->value) === $role->value;
    }

/**
     * Ajoute un rôle au bitmask (ex: quand le prospect devient locataire)
     */
    public function addRole(UserRole $role): void
    {
//        $this->roles_mask |= $role->value;
        $this->roles |= $role->value;
        $this->save();
    }    

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    
    // 3. On ajoute la fonction obligatoire demandée par le contrat
    public function canAccessPanel(Panel $panel): bool
    {
        // Si c'est le panel Admin, il faut le rôle ADMINISTRATEUR (valeur 1)
        if ($panel->getId() === 'admin') {
            return $this->hasRole(UserRole::ADMINISTRATEUR);
        }
        // Si c'est le panel Candidat, il faut le rôle CANDIDAT (valeur 1)
        if ($panel->getId() === 'candidat') {
            return $this->hasRole(UserRole::CANDIDAT);
        }

        // tester ici les conditions d'accès aux autres panels
        return false;
    }    

    // À l'intérieur de la classe User :
    public function candidat(): HasOne
    {
        return $this->hasOne(Candidat::class);
    }

/**
     * Accessor moderne pour récupérer la liste des rôles en texte d'après le bitmask $this->role
     */
    protected function roleNames(): Attribute
    {
        return Attribute::make(
            get: function (mixed $value, array $attributes): array {
                $userRoles = [];
                // Récupère la valeur du champ 'role' de la table
//                $userRoleBitmask = (int) ($this->getRawOriginal('roles_mask') ?? 0);
                $userRoleBitmask = (int) ($attributes['roles'] ?? 0);                

                // On parcourt chaque cas de l'Enum
                foreach (UserRole::cases() as $roleEnum) {
                    if (($userRoleBitmask & $roleEnum->value) === $roleEnum->value) {
                        $userRoles[] = method_exists($roleEnum, 'getLabel') 
                            ? $roleEnum->getLabel() 
                            : ($roleEnum->label ?? $roleEnum->name);
                    }
                }

                return $userRoles;
            }
        );
    }

// /**
//      * Accessor moderne pour récupérer la liste des rôles en texte d'après le bitmask $this->role
//      */
//     protected function userRoles(): Attribute
//     {
//         return Attribute::make(
//             get: function (mixed $value, array $attributes): array {
//                 $features = [];
//                 // Récupère la valeur du champ 'role' de la table
// //                $userRoleBitmask = (int) ($this->getRawOriginal('roles_mask') ?? 0);
//                 $userRoleBitmask = (int) ($attributes['roles'] ?? 0);                

//                 // On parcourt chaque cas de l'Enum
//                 foreach (UserRole::cases() as $roleEnum) {
//                     if (($userRoleBitmask & $roleEnum->value) === $roleEnum->value) {
//                         $features[] = method_exists($roleEnum, 'getLabel') 
//                             ? $roleEnum->getLabel() 
//                             : ($roleEnum->label ?? $roleEnum->name);
//                     }
//                 }

//                 return $features;
//             }
//         );
//     }

}

// mdp pour pyr.consultant@glaim.com : Zorgen36
// mdp pour kimlee@free.fr: Zorgen36
