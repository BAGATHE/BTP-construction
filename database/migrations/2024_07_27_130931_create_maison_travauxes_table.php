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
        Schema::create('maison_travaux', function (Blueprint $table) {
            $table->id();
            $table->string('type_maison');
            $table->longtext('description');
            $table->integer('surface');
            $table->string('code_travaux');
            $table->string('type_travaux');
            $table->string('unite');
            $table->decimal('prix_unitaire',13,2);
            $table->decimal('quantite',5,2);
            $table->integer('duree_travaux');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maison_travaux');
    }
};
