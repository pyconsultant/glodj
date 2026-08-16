<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\UserRole;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            Schema::table('users', function (Blueprint $table) {
                // Un entier non signé pour stocker l'addition des bits (défaut = Prospect)
                $table->unsignedBigInteger('roles_mask')
                      ->default(UserRole::CANDIDAT->value)
                      ->after('email');
            }); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('roles_mask');
        });
    }
};
