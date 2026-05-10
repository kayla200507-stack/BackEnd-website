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
        Schema::create('jadwal_wawancaras', function (Blueprint $table) {
            $table->id('id_wawancara');
            $table->foreignId('id_pendaftaran')->constrained('pendaftaran_magangs', 'id_pendaftaran')->onDelete('cascade');
            $table->dateTime('tanggal_wawancara');
            $table->string('lokasi_wawancara');
            $table->string('metode');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_wawancaras');
    }
};
