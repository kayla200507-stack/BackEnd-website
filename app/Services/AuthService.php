<?php

namespace App\Services;

use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthService
{
    /**
     * Register a new Student (Mahasiswa).
     */
    public function registerAsStudent(array $data): User
    {
        return DB::transaction(function () use ($data) {
            $user = User::create([
                'nama' => $data['nama'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role' => 'mahasiswa',
                'no_telp' => $data['no_telp'] ?? null,
            ]);

            $user->mahasiswa()->create([
                'nim' => $data['nim'],
                'jurusan' => $data['jurusan'],
                'program_studi' => $data['program_studi'],
                'semester' => $data['semester'],
                'angkatan' => $data['angkatan'],
                'alamat' => $data['alamat'],
                'status_magang' => 'belum',
            ]);

            return $user->load('mahasiswa');
        });
    }

    /**
     * Register a new Lecturer (Dosen).
     */
    public function registerAsDosen(array $data): User
    {
        return DB::transaction(function () use ($data) {
            $user = User::create([
                'nama' => $data['nama'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role' => 'dosen',
                'no_telp' => $data['no_telp'] ?? null,
            ]);

            $user->dosen()->create([
                'nip' => $data['nip'],
                'fakultas' => $data['fakultas'],
                'bidang_keahlian' => $data['bidang_keahlian'],
            ]);

            return $user->load('dosen');
        });
    }

    /**
     * Authenticate user and return token.
     */
    public function login(array $credentials): ?string
    {
        if (! $token = Auth::guard('api')->attempt($credentials)) {
            return null;
        }

        return $token;
    }

    /**
     * Get token details.
     */
    public function getTokenDetails(string $token): array
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::guard('api')->factory()->getTTL() * 60
        ];
    }

    /**
     * Logout user.
     */
    public function logout(): void
    {
        Auth::guard('api')->logout();
    }

    /**
     * Refresh token.
     */
    public function refresh(): string
    {
        return Auth::guard('api')->refresh();
    }

    /**
     * Get current authenticated user.
     */
    public function me(): ?User
    {
        return Auth::guard('api')->user();
    }
}
