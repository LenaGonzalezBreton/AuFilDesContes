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
        Schema::create('cavernes', function (Blueprint $table) {
            $table->id("id_caverne");
            $table->string("titre_caverne");
            $table->string("intro_caverne");
            $table->string("image_caverne");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cavernes');
    }
};
