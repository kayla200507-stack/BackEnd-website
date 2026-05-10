<?php

namespace App\Http\Requests\Logbook;

use Illuminate\Foundation\Http\FormRequest;

class StoreLogbookRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'id_magang' => 'required|exists:mahasiswa_magangs,id_magang',
            'tanggal' => 'required|date',
            'kegiatan' => 'required|string',
            'kendala' => 'nullable|string',
            'status_validasi' => 'required|string',
        ];
    }
}
