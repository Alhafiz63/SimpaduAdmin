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
        Schema::create('ruang', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->tinyInteger('id_prodi');
            $table->string('nama_ruang', 100)->unique();
            $table->timestamps();

            $table->foreign('id_prodi')
                    ->references('id')
                    ->on('prodi')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ruang');
    }
};
