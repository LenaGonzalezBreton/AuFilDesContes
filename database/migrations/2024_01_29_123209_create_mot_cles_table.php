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
            $table->id("id_mot_cle");
            $table->string("libelle_conte");
            $table->timestamps();
        });

        Schema::create('motcle_conte', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Conte::class);
            $table->foreignIdFor(\App\Models\MotCle::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mot_cles');
    }
};
