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
            $table->id();
            $table->string("titre_caverne");
            $table->string("intro_caverne");
            $table->string("image_caverne");
            $table->timestamps();
        });

        // Schema::create('app_version', function (Blueprint $table) {
        //     $table->id();
        //     $table->string("version");
        // });

        // Schema::create('token', function (Blueprint $table) {
        //     $table->id();
        //     $table->string("login_token");
        //     $table->string("mot_de_passe");
        // });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cavernes');
        Schema::dropIfExists('app_version');
        Schema::dropIfExists('token');
    }
};
