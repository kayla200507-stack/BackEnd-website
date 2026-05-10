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
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('id', 'id_user');
            $table->renameColumn('name', 'nama');
            $table->string('foto_profile')->nullable()->after('role');
            $table->string('no_telp')->nullable()->after('foto_profile');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('id_user', 'id');
            $table->renameColumn('nama', 'name');
            $table->dropColumn(['foto_profile', 'no_telp']);
        });
    }
};
