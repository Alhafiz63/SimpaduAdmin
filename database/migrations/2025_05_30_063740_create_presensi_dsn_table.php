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
        Schema::create('presensi_dsn', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->tinyInteger('pertemuan_ke');
            $table->foreignId('id_kelas_mk')
                ->constrained('kelas_mk', 'id')
                ->onDelete('cascade');
            $table->date('tanggal');
            $table->time('waktu_presensi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presensi_dsn');
    }
};
