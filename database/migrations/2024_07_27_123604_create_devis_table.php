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
        Schema::create('devis', function (Blueprint $table) {
            $table->id();
            $table->string('numero');
            $table->string('ref_devis');
            $table->string('type_maison');
            $table->string('finition');
            $table->decimal('taux_finition',5,2);
            $table->date('date_debut');
            $table->date('date_reference');
            $table->timestamps();
            $table->foreign('numero')->references('numero')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devis');
    }
};
