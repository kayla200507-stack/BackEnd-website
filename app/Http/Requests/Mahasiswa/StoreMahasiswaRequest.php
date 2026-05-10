<?php

namespace App\Http\Requests\Mahasiswa;

use Illuminate\Foundation\Http\FormRequest;

class StoreMahasiswaRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'id_user' => 'required|exists:users,id_user',
            'nim' => 'required|string|unique:mahasiswas,nim',
            'jurusan' => 'required|string',
            'program_studi' => 'required|string',
            'semester' => 'required|integer|min:1|max:14',
            'angkatan' => 'required|integer|min:2000|max:' . date('Y'),
            'alamat' => 'required|string',
            'cv' => 'nullable|string',
            'status_magang' => 'nullable|string',
        ];
    }
}
