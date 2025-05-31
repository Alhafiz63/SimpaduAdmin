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
        Schema::create('prodi', function (Blueprint $table) {
            $table->tinyInteger('id')->primary();
            $table->tinyInteger('id_jurusan');
            $table->string('nama', 100)->unique();
            $table->timestamps();
            
            $table->foreign('id_jurusan')
                    ->references('id')
                    ->on('jurusan')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prodi');
    }
};
