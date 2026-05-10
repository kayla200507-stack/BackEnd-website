<?php

namespace App\Http\Requests\Pendaftaran;

use Illuminate\Foundation\Http\FormRequest;

class StorePendaftaranRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'id_mahasiswa' => 'required|exists:mahasiswas,id_mahasiswa',
            'id_lowongan' => 'required|exists:lowongans,id_lowongan',
            'tanggal_daftar' => 'required|date',
            'status_pendaftaran' => 'required|string',
            'cv_file' => 'nullable|string',
            'surat_pengantar' => 'nullable|string',
            'transkrip_nilai' => 'nullable|string',
            'catatan' => 'nullable|string',
        ];
    }
}
