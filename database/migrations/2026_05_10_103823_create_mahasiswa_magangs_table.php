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
        Schema::create('mahasiswa_magangs', function (Blueprint $table) {
            $table->id('id_magang');
            $table->foreignId('id_mahasiswa')->constrained('mahasiswas', 'id_mahasiswa')->onDelete('cascade');
            $table->foreignId('id_dosen')->constrained('dosens', 'id_dosen')->onDelete('cascade');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('status_magang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa_magangs');
    }
};
