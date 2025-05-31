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
        Schema::create('kelas_mhs', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->integer('id_kelas');
            $table->tinyInteger('no_absen')->comment('Nomor urut absen dalam kelas');
            $table->char('nim', 10)->comment('Nomor Induk Mahasiswa');
            $table->string('id_tahun_akd', 5);
            $table->tinyInteger('smt');
            $table->char('id_status_mhs', 1);
            $table->timestamps();

            $table->foreign('id_kelas')
                ->references('id')
                ->on('kelas')
                ->onDelete('cascade');
            $table->foreign('id_tahun_akd')
                ->references('id')
                ->on('tahun_akd')
                ->onDelete('cascade');
            $table->foreign('id_status_mhs')
                ->references('id')
                ->on('status_mhs')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas_mhs');
    }
};
