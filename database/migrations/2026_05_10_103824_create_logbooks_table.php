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
        Schema::create('logbooks', function (Blueprint $table) {
            $table->id('id_logbook');
            $table->foreignId('id_magang')->constrained('mahasiswa_magangs', 'id_magang')->onDelete('cascade');
            $table->date('tanggal');
            $table->text('kegiatan');
            $table->text('kendala')->nullable();
            $table->string('status_validasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logbooks');
    }
};
