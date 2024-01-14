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
        Schema::table('nilai_peserta', function (Blueprint $table) {
            $table->integer('tahun')->nullable()->default(null);
            $table->char('level', 1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('nilai_peserta', function (Blueprint $table) {
            //
        });
    }
};
