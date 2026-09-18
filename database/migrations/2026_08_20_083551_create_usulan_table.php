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
        Schema::create('usulan', function (Blueprint $table) {
            $table->id();

            // Relasi ke siswa (berdasarkan NIS)
            $table->string('nis', 20);
            $table->foreign('nis')->references('nis')->on('siswa')->onDelete('cascade');

            // Informasi pengusul (guru/wali kelas)
            $table->string('nama_pengusul', 100);

            // Jenis usulan
            $table->enum('jenis', ['prestasi', 'pelanggaran']);

            // Besaran poin yang diusulkan
            $table->integer('poin');

            // Deskripsi / keterangan usulan
            $table->text('keterangan');

            // Status verifikasi
            $table->enum('status', ['menunggu', 'disetujui', 'ditolak'])->default('menunggu');

            // Catatan dari verifikator (admin)
            $table->text('catatan_verifikasi')->nullable();

            // Waktu verifikasi
            $table->timestamp('verified_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usulan');
    }
};
