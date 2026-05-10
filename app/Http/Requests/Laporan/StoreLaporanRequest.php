<?php

namespace App\Http\Requests\Laporan;

use Illuminate\Foundation\Http\FormRequest;

class StoreLaporanRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'id_magang' => 'required|exists:mahasiswa_magangs,id_magang',
            'judul_laporan' => 'required|string|max:255',
            'file_laporan' => 'required|string',
            'tanggal_upload' => 'required|date',
            'status_review' => 'required|string',
        ];
    }
}
