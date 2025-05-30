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
            $table->foreignId('id_presensi_dsn')
                ->constrained('presensi_dsn', 'id')
                ->onDelete('cascade');
            $table->foreignId('id_kelas_mhs')
                ->constrained('kelas_mhs', 'id')
                ->onDelete('cascade');
            $table->time('waktu_presensi');
            $table->char('status', 1)->comment('0: Tidak Hadir, 1: Hadir, 2: Sakit, 3: Izin');
            $table->timestamps();
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
