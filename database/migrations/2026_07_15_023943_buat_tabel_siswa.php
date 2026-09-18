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
            $table->string('nis', 20)->primary(); // NIS sebagai Primary Key
            $table->string('password');
            $table->string('nama_lengkap', 100);
            $table->string('kelas', 20);
            $table->string('jurusan', 50)->nullable();
            $table->text('alamat')->nullable();
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan']); // Diubah ke ENUM agar lebih rapi
            
            // Pengaturan Poin
            $table->integer('poin_awal')->default(100);
            $table->integer('poin_kurang')->default(0);
            $table->integer('poin_tambah')->default(0);
            $table->integer('total_poin')->default(100);

            $table->text('prestasi')->nullable(); 
            $table->text('pelanggaran')->nullable();

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