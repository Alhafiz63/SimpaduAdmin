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
            $table->integer('id')->primary();
            $table->foreignId('id_kelas')
                ->constrained('kelas', 'id')
                ->onDelete('cascade');
            $table->foreignId('id_kurikulum')
                ->constrained('kurikulum', 'id')
                ->onDelete('cascade');
            $table->foreignId('id_ruang')
                ->constrained('ruang', 'id')
                ->onDelete('cascade');
            $table->timestamps();
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
