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
        Schema::create('matkul', function (Blueprint $table) {
            $table->smallInteger('id')->primary()->autoIncrement();
            $table->tinyInteger('id_prodi');
            $table->string('nama', 100)->unique();
            $table->float('sks', 5, 2);
            $table->tinyInteger('semester');
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
        Schema::dropIfExists('matkul');
    }
};
