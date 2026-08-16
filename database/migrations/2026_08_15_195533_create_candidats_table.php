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
        Schema::create('candidats', function (Blueprint $table) {
            $table->id();
            // Lien direct avec la table users (un utilisateur = un candidat)
            $table->foreignId('user_id')
                  ->constrained()
                  ->cascadeOnDelete();   
            // Informations personnelles & coordonnées
            $table->string('prenom')->nullable();
            $table->string('nom')->nullable();
            $table->string('adresse_mail')->nullable();
            $table->string('telephone')->nullable();
            $table->string('location')->nullable();
            $table->string('sexe')->nullable();
            $table->date('date_naissance')->nullable();                           
            $table->date('date_entree_souhaitee')->nullable();                           
            $table->smallinteger('duree_envisagee')->nullable(); // en mois
            // Pièces justificatives (stockage des chemins de fichiers)
            $table->string('piece_identite_path')->nullable();
            $table->string('titre_sejour_path')->nullable(); // seulement si ressortisant non-UE
            $table->string('attestation_garant_path')->nullable(); // Visale, Garanteme, 
            // Suivi du dossier de candidature
            $table->string('statut')->default('en_attente'); // en_attente, valide,
            $table->longtext('complement_libre');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidats');
    }
};
