<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_register_as_student()
    {
        $response = $this->postJson('/api/auth/register/student', [
            'nama' => 'Student User',
            'email' => 'student@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'nim' => '12345678',
            'jurusan' => 'Teknik Informatika',
            'program_studi' => 'TI',
            'semester' => 6,
            'angkatan' => 2021,
            'alamat' => 'Jl. Test No. 1',
        ]);

        $response->assertStatus(201)
                 ->assertJson([
                     'status' => 'success',
                     'data' => [
                         'role' => 'mahasiswa',
                         'mahasiswa' => [
                             'nim' => '12345678'
                         ]
                     ]
                 ]);
    }

    public function test_user_can_register_as_dosen()
    {
        $response = $this->postJson('/api/auth/register/dosen', [
            'nama' => 'Dosen User',
            'email' => 'dosen@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'nip' => '19870101202001',
            'fakultas' => 'Teknik',
            'bidang_keahlian' => 'Software Engineering',
        ]);

        $response->assertStatus(201)
                 ->assertJson([
                     'status' => 'success',
                     'data' => [
                         'role' => 'dosen',
                         'dosen' => [
                             'nip' => '19870101202001'
                         ]
                     ]
                 ]);
    }

    public function test_admin_can_login_from_seeder()
    {
        $this->seed(\Database\Seeders\AdminSeeder::class);

        $response = $this->postJson('/api/auth/login', [
            'email' => 'admin@magang.com',
            'password' => 'admin123',
        ]);

        $response->assertStatus(200)
                 ->assertJson([
                     'status' => 'success',
                     'message' => 'Successfully logged in'
                 ])
                 ->assertJsonStructure(['data' => ['access_token']]);
    }
}
