<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

// 1. On importe l'interface de Filament (le "contrat")
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Enums\UserRole;

// use Database\Factories\UserFactory;
// use Illuminate\Database\Eloquent\Attributes\Fillable;
// use Illuminate\Database\Eloquent\Attributes\Hidden;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];    

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
        // $id = $panel->getId(); rtourne le nom de l'utilisateur créé lors de "php artisan make:filament-user"
        
        // $usertype = 4 ;
        // $userfunction = ($usertype & 6);
        // $usernationality = config('constants.nationalites.64');
        // $userstate = config('constants.etats.BN');

        $usertype = config('constants.LOCATAIRE'); ;

        // $usertype = config('constants.1');
        // $usertype = config('constants.2');
        // $usertype = config('constants.4');
        // $usertype = config('constants.8');
        // $usertype = config('constants.16');
        // $usertype = getenv("OWT_APP");
        // Tu autorises uniquement ton adresse email à te connecter à l'administration
        return $this->email === 'pyr.consultant@gmail.com';
    }    

    public function hasRole(UserRole $role): bool
    {
        return ($this->role_mask & $role->value) === $role->value;
    }

    public function addRole(UserRole $role): void
    {
        $this->role_mask |= $role->value;
    }
}

// mdp pour pyr.consultant@glaim.com : Pya1801Orowan
// mdp pour kimlee@free.fr: Zorgen36
