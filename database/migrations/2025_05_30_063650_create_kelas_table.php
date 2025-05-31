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
        Schema::create('kelas', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->char('id_tahun_akd', 5);
            $table->tinyInteger('id_prodi');
            $table->string('nama', 50);
            $table->timestamps();

            $table->foreign('id_tahun_akd')
                ->references('id')
                ->on('tahun_akd')
                ->onDelete('cascade');
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
        Schema::dropIfExists('kelas');
    }
};
