<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('catatan_verifikasi', function (Blueprint $table) {
            $table->id();

            // Relasi ke siswa via NIS
            $table->string('nis', 20);
            $table->foreign('nis')->references('nis')->on('siswa')->onDelete('cascade');

            // Jenis catatan
            $table->enum('jenis', ['prestasi', 'pelanggaran']);

            // Kategori (mis. Kedisiplinan, Akademik, dll)
            $table->string('kategori', 80)->nullable();

            // Keterangan / deskripsi catatan
            $table->text('keterangan');

            // Nilai poin yang diusulkan
            $table->integer('nilai_poin');

            // Tanggal kejadian
            $table->date('tanggal_catatan');

            // Nama pencatat (guru/wali kelas)
            $table->string('nama_pencatat', 100);

            // Status verifikasi
            $table->enum('status', ['menunggu', 'disetujui', 'ditolak'])->default('menunggu');

            // Catatan dari admin saat verifikasi
            $table->text('catatan_admin')->nullable();

            // Waktu diverifikasi
            $table->timestamp('verified_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('catatan_verifikasi');
    }
};

