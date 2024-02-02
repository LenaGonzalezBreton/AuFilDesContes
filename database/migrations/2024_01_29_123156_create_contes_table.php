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
        Schema::create('contes', function (Blueprint $table) {
            $table->id();
            $table->string("titre_conte");
            $table->string("intro_conte");
            $table->string("image_conte");
            $table->string("histoire_conte");
            $table->integer("nombre_lecture_conte");
            $table->integer("note_conte");
            $table->integer("nombre_note_conte");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contes');
    }
};
