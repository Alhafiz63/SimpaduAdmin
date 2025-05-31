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
            $table->integer('id')->primary()->autoIncrement();
            $table->tinyInteger('pertemuan_ke');
            $table->integer('id_kelas_mk');
            $table->date('tanggal');
            $table->time('waktu_presensi');
            $table->timestamps();

            $table->foreign('id_kelas_mk')
                ->references('id')
                ->on('kelas_mk')
                ->onDelete('cascade');
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
