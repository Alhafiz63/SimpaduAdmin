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
        Schema::create('nilai', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->foreignId('id_kelas_mk')
                ->constrained('kelas_mk', 'id')
                ->onDelete('cascade');
            $table->foreignId('id_kelas_mhs')
                ->constrained('kelas_mhs', 'id')
                ->onDelete('cascade');
            $table->float('n_angka', 5, 2)->nullable();
            $table->string('n_huruf', 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai');
    }
};
