<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiPesertaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_peserta', function (Blueprint $table) {
            $table->id();
            $table->string('nim');
            $table->string('nama_peserta');
            $table->string('nama_fasilitator');
            $table->float('nilai_akhir');
            $table->integer('presensi');
            $table->float('total_nilai');
            $table->char('konversi_nilai', 1)->nullable();
            $table->year('tahun')->after('total_nilai');
            $table->char('level', 1)->after('tahun');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai_peserta');
    }
}
