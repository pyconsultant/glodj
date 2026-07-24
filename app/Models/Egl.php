<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Egl extends Model
{
    // Pour ne pas obliger à remplir es champs
    protected $guarded = [];

    // / Indique les champs qui peuvent être remplis en masse
    // protected $fillable = ['nom', 'adresse', 'type_global'];    

    // sinon, c'est ici les champs obligatores
    // protected $fillable = [
    //     'EGLid',
    //     'nom',
    //     'adresse',
    //     'complement',
    //     'codepostal',
    //     'commune',
    //     'codepays',
    //     'pays',
    //     'commentaire',
    // ];

    /**
     * Obtenir toutes les unités atomiques (Ual) associées à cette entité globale (Egl).
     */
    public function uals(): HasMany
    {
        return $this->hasMany(Ual::class);
    }
}

