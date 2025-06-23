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
        Schema::create('presensi_mhs', function (Blueprint $table) {
            $table->integer('id_presensi_dsn');
            $table->bigInteger('id_kelas_mhs');
            $table->time('waktu_presensi');
            $table->date('tanggal');
            $table->enum('status', ['A', 'H', 'S', 'I']);
            $table->timestamps();

            $table->foreign('id_presensi_dsn')
                ->references('id')
                ->on('presensi_dsn')
                ->onDelete('cascade');
            $table->foreign('id_kelas_mhs')
                ->references('id')
                ->on('kelas_mhs')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presensi_mhs');
    }
};
