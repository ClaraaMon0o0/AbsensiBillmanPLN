<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('absensi', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('pengguna_id');
            $table->integer('jumlah_kegiatan');
            $table->string('bukti_foto');
            $table->enum('status', ['Hadir','Izin','Sakit','Cuti']);
            $table->date('tanggal');
            $table->time('waktu');
            $table->timestamps();

            $table->foreign('pengguna_id')->references('id')->on('pengguna')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('absensi');
    }
};
