<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Candidat extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Relation : Le dossier de candidature appartient à un Utilisateur
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }    
}
