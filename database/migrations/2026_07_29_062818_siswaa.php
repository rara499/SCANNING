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
         Schema::create('siswaa', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('NISN');
            $table->string('kelas');
            $table->string('jurusan');
            $table->string('alamat');
            $table->string('jenis_kelamin');
            $table->integer('poin_awal')->default(100);
            $table->integer('poin_kurang')->default(0);
            $table->integer('poin_tambah')->default(0);
            $table->integer('total_poin')->default(100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
