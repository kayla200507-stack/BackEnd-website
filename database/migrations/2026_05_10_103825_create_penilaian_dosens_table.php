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
        Schema::create('penilaian_dosens', function (Blueprint $table) {
            $table->id('id_penilaian_dosen');
            $table->foreignId('id_magang')->constrained('mahasiswa_magangs', 'id_magang')->onDelete('cascade');
            $table->float('nilai_laporan');
            $table->float('nilai_logbook');
            $table->float('nilai_akhir');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaian_dosens');
    }
};
