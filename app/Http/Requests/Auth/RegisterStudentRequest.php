<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterStudentRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            // User fields
            'nama' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'no_telp' => 'nullable|string|max:20',
            
            // Mahasiswa fields
            'nim' => 'required|string|unique:mahasiswas,nim',
            'jurusan' => 'required|string',
            'program_studi' => 'required|string',
            'semester' => 'required|integer|min:1|max:14',
            'angkatan' => 'required|integer|min:2000|max:' . date('Y'),
            'alamat' => 'required|string',
        ];
    }
}
