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
            $table->integer('id_kelas_mk');
            $table->bigInteger('id_kelas_mhs');
            $table->float('n_angka', 5, 2)->nullable();
            $table->string('n_huruf', 2)->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('nilai');
    }
};
