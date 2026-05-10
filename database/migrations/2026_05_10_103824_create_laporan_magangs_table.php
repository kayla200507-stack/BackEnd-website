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
        Schema::create('laporan_magangs', function (Blueprint $table) {
            $table->id('id_laporan');
            $table->foreignId('id_magang')->constrained('mahasiswa_magangs', 'id_magang')->onDelete('cascade');
            $table->string('judul_laporan');
            $table->string('file_laporan');
            $table->date('tanggal_upload');
            $table->string('status_review');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_magangs');
    }
};
