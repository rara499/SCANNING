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
        Schema::create('siswa', function (Blueprint $table) {
        $table->id();

        $table->string('nis', 20)->unique();
        $table->string('password');
        $table->string('nama_lengkap', 100);
        $table->string('kelas', 20);
        $table->text('alamat')->nullable();

        $table->string('jenis_kelamin', 10);
        $table->string('poin_awal')->default('100');
        $table->string('poin_kurang')->default('0');
        $table->string('poin_tambah')->default('0');
        $table->integer('total_poin')->default('100');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
