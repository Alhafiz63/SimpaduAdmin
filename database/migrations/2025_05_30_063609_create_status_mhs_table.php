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
        Schema::create('status_mhs', function (Blueprint $table) {
            $table->char('id', 1)->primary();
            $table->string('nama_status', 10)->unique()->comment('Nama status mahasiswa, misalnya: Aktif, SP1, SP2, SP3, Lulus, Terminal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_mhs');
    }
};
