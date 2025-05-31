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
            $table->integer('id')->primary()->autoIncrement();
            $table->smallInteger('id_matkul');
            $table->char('id_tahun_akd', 5);
            $table->tinyInteger('id_prodi');
            $table->string('nama', 100);
            $table->timestamps();

            $table->foreign('id_matkul')
                ->references('id')
                ->on('matkul')
                ->onDelete('cascade');
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
        Schema::dropIfExists('kurikulum');
    }
};
