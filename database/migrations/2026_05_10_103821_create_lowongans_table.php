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
        Schema::create('lowongans', function (Blueprint $table) {
            $table->id('id_lowongan');
            $table->foreignId('id_kategori')->constrained('kategori_lowongans', 'id_kategori')->onDelete('cascade');
            $table->string('judul_lowongan');
            $table->text('deskripsi');
            $table->string('lokasi');
            $table->string('tipe_magang');
            $table->string('durasi');
            $table->integer('kuota');
            $table->date('deadline');
            $table->string('status_lowongan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lowongans');
    }
};
