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
        Schema::create('pengumumen', function (Blueprint $table) {
            $table->id('id_pengumuman');
            $table->foreignId('id_admin')->constrained('admins', 'id_admin')->onDelete('cascade');
            $table->string('judul');
            $table->text('isi_pengumuman');
            $table->dateTime('tanggal_publish');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengumumen');
    }
};
