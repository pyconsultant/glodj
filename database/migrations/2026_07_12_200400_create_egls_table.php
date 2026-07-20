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
        Schema::create('egls', function (Blueprint $table) {
            $table->id();
            $table->string('code',5)->unique(); // code 
            $table->string('nom',25); // nom de l'EGL (appartement ou garage)
            $table->string('adresse',35); 
            $table->string('complement',35)->nullable(); 
            $table->string('codepostal',5); 
            $table->string('commune',25); 
            $table->string('codepays',3); 
            $table->string('pays'); 
            $table->longtext('commentaire')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('egls');
    }
};
