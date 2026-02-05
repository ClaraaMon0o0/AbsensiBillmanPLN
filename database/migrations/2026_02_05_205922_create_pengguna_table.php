<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengguna', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('peran_id');
            $table->string('nama_lengkap', 100);
            $table->string('email')->unique();
            $table->string('kata_sandi');
            $table->string('foto')->nullable();
            $table->timestamps();

            $table->foreign('peran_id')->references('id')->on('peran')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengguna');
    }
};
