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
    Schema::create('surat', function (Blueprint $table) {
        $table->id();
        $table->foreignId('siswa_id')->constrained('siswa')->onDelete('cascade');
        $table->string('nomor_surat', 50)->unique();
        $table->date('tanggal_surat');
        $table->enum('jenis', ['peringatan', 'pujian', 'lainnya']);
        $table->text('isi_surat');
        $table->string('file_surat')->nullable();
        $table->enum('status', ['diajukan', 'disetujui', 'ditolak'])->default('diajukan');
        $table->timestamps();
    });
}
};
