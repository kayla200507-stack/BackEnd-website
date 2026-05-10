<?php

namespace App\Http\Requests\Mahasiswa;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMahasiswaRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'nim' => 'sometimes|string|unique:mahasiswas,nim,' . $this->route('mahasiswa'),
            'jurusan' => 'sometimes|string',
            'program_studi' => 'sometimes|string',
            'semester' => 'sometimes|integer|min:1|max:14',
            'angkatan' => 'sometimes|integer|min:2000|max:' . date('Y'),
            'alamat' => 'sometimes|string',
            'cv' => 'nullable|string',
            'status_magang' => 'nullable|string',
        ];
    }
}
