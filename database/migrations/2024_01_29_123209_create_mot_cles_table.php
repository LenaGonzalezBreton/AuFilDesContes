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
        Schema::create('mot_cles', function (Blueprint $table) {
            $table->id();
            $table->string("libelle_conte");
            $table->timestamps();
        });

        Schema::create('conte_mot_cle', function (Blueprint $table) {
            // $table->foreign('conte_id')->references('id')->on('contes');
            // $table->foreign('mot_cle_id')->references('id')->on('mot_cles');
            $table->foreignId('conte_id')->constrained();
            $table->foreignId('mot_cle_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conte_mot_cle');
        Schema::dropIfExists('mot_cles');
    }
};
