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
        Schema::create('kurikulum', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->foreignId('id_matkul')
                ->constrained('matkul', 'id')
                ->onDelete('cascade');
            $table->foreignId('id_tahun_akd')
                ->constrained('tahun_akd', 'id')
                ->onDelete('cascade');
            $table->foreignId('id_prodi')
                ->constrained('prodi', 'id')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kurikulum');
    }
};
