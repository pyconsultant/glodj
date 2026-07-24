<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('uals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('egl_id')
            ->constrained()
            ->cascadeOnDelete();
            $table->smallinteger('num'); // numéro de la chambre
            $table->string('UALid'); // nom de l'unité (chambre jaune, chambre de ...)
            $table->enum('type',['chambre','garage','parking','cave']);
            $table->decimal('surface',4,1);
            $table->decimal('loyer',8,2); // montant du loyer mensuel par défaut
            $table->decimal('charges',8,2);// montant du loyer mensuel par défaut
            $table->decimal('dge',8,2); // montant du dépot de garantie encaissable
            $table->decimal('dgc',8,2); // montant du dépot de garantie par chèque
            $table->boolean('louable'); // pour la déclaration des locataires aux impôts
            $table->longtext('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uals');
    }
};
