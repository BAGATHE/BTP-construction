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

            Schema::table('users', function (Blueprint $table) {
                $table->string('numero')->unique()->after('id'); // Ajoute une colonne 'numero' unique après la colonne 'id'
            });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('numero'); // Supprime la colonne 'numero'
        });
    }
};
