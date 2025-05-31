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
            $table->bigInteger('id_kelas_mhs');;
            $table->time('waktu_presensi');
            $table->char('status', 1)->comment('0: Tidak Hadir, 1: Hadir, 2: Sakit, 3: Izin');
            $table->timestamps();

            $table->primary(['id_presensi_dsn', 'id_kelas_mhs'], 'presensi_mhs_primary_key');
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
