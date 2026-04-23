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
        Schema::create('conferences', function (Blueprint $table) {
            $table->id();
            $table->text('genDescription')->nullable();
            $table->string('enLink')->nullable();
            $table->string('psLink')->nullable();
            $table->string('daLink')->nullable();
            $table->string('arLink')->nullable();
            $table->string('image')->nullable();                // main conference image
            $table->string('posterEnLink')->nullable();         
            $table->string('posterPsLink')->nullable();         
            $table->string('posterDaLink')->nullable();         
            $table->string('posterArLink')->nullable();         
            $table->json('posterImage')->nullable();            // array of up to 4 image paths
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conferences');
    }
};
