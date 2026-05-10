<?php

namespace App\Http\Requests\Magang;

use Illuminate\Foundation\Http\FormRequest;

class StoreMagangRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'id_mahasiswa' => 'required|exists:mahasiswas,id_mahasiswa',
            'id_dosen' => 'required|exists:dosens,id_dosen',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai',
            'status_magang' => 'required|string',
        ];
    }
}
