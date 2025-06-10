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
        Schema::create('schools_models', function (Blueprint $table) {
            $table->bigIncrements('id_schools');
            $table->string('nama');
            $table->string('deskripsi');
            $table->string('alamat');
            $table->string('kontak');
            $table->string('logo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schools_models');
    }
};
