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
        Schema::create('master_poins', function (Blueprint $table) {
            $table->id();
            
            // Nama Aturan / Nama Pelanggaran / Nama Prestasi
            $table->string('nama_aturan', 150); 
            
            // Tipe: apakah ini 'pelanggaran' atau 'prestasi'
            $table->enum('tipe', ['pelanggaran', 'prestasi']); 
            
            // Bobot poin (contoh: 10, 20, 50)
            $table->integer('bobot_poin'); 

            // Deskripsi / Kategori Opsional (misal: "Kedisiplinan", "Kerapihan", "Akademik")
            $table->string('kategori', 50)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_poins');
    }
};