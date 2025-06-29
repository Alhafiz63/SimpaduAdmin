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
        Schema::create('kelas_mk', function (Blueprint $table) {
            $table->integer('id')->primary()->autoIncrement();
            $table->integer('id_kelas');
            $table->integer('id_kurikulum')
                ->comment('ID Kurikulum yang digunakan untuk kelas ini');
            $table->integer('id_pegawai')
                ->comment('ID Dosen yang mengajar kelas ini');
            $table->string('nama_pengajar', 100)
                ->comment('Nama Dosen yang mengajar kelas ini');
            $table->integer('id_ruang');
            $table->timestamps();
            
            $table->foreign('id_kelas')
                ->references('id')
                ->on('kelas')
                ->onDelete('cascade');
            $table->foreign('id_kurikulum')
                ->references('id')
                ->on('kurikulum')
                ->onDelete('cascade');
                $table->foreign('id_ruang')
                ->references('id')
                ->on('ruang')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas_mk');
    }
};
