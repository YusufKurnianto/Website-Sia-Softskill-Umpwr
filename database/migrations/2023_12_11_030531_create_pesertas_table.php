<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migrasi untuk membuat tabel 'peserta'
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Membuat tabel 'peserta' dengan kolom-kolom berikut
        Schema::create('peserta', function (Blueprint $table) {
            $table->integer('id');
            $table->unique('id');
            $table->integer('nim');
            $table->string('nama_lengkap');
            $table->string('prodi');
            $table->enum('level', ['Level 1', 'Level 2', 'Level 3', 'Level 4']);
            $table->enum('tahun', ['2021', '2022', '2023']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         // Menghapus tabel 'peserta' jika migrasi di-rollback (mengembalikan (mengurangi versi) database ke keadaan sebelumnya)
        Schema::dropIfExists('peserta');
    }
};
