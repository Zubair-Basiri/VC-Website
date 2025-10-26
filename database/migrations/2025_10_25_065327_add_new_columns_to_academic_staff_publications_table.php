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
        Schema::table('academic_staff_publications', function (Blueprint $table) {
            $table->string('title');
            $table->string('master_bachelor');
            $table->string('category');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('academic_staff_publications', function (Blueprint $table) {
            //
        });
    }
};
