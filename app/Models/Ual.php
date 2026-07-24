<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ual extends Model
{
//     protected $fillable = ['egl_id', 'nom', 'type', 'surface', 'description'];
    protected $guarded = [];
    /**
     * Obtenir l'entité globale (Egl) à laquelle appartient cette unité (Ual).
     */
    public function egl(): BelongsTo
    {
        return $this->belongsTo(Egl::class);
    }
}
