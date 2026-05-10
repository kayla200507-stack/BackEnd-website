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
        Schema::create('pendaftaran_magangs', function (Blueprint $table) {
            $table->id('id_pendaftaran');
            $table->foreignId('id_mahasiswa')->constrained('mahasiswas', 'id_mahasiswa')->onDelete('cascade');
            $table->foreignId('id_lowongan')->constrained('lowongans', 'id_lowongan')->onDelete('cascade');
            $table->date('tanggal_daftar');
            $table->string('status_pendaftaran');
            $table->string('cv_file')->nullable();
            $table->string('surat_pengantar')->nullable();
            $table->string('transkrip_nilai')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_magangs');
    }
};
