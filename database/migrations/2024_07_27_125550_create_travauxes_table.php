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
        Schema::create('travaux', function (Blueprint $table) {
            $table->id();
            $table->string('code_travaux');
            $table->string('type_travaux');
            $table->string('unite');
            $table->decimal('quantite',6,2);
            $table->decimal('prix_unitaire',13,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travaux');
    }
};
