<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Egl extends Model
{
    // Pour ne pas obliger à remplir es champs
    protected $guarded = [];
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

    // $table->string('EGLid',5); // code 
    // $table->string('nom',25); // nom de l'EGL (appartement ou garage)
    // $table->string('adresse',35); 
    // $table->string('complement',35); 
    // $table->string('codepostal',5); 
    // $table->string('commune',25); 
    // $table->string('codepays',3); 
    // $table->string('pays'); 
    // $table->longtext('commentaire'); 


}
