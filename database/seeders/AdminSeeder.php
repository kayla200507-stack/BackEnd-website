<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'nama' => 'System Administrator',
            'email' => 'admin@magang.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        Admin::create([
            'id_user' => $user->id_user,
            'jabatan' => 'Super Admin',
        ]);
    }
}
