<?php

namespace App\Http\Requests\Lowongan;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLowonganRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'id_kategori' => 'sometimes|exists:kategori_lowongans,id_kategori',
            'judul_lowongan' => 'sometimes|string|max:255',
            'deskripsi' => 'sometimes|string',
            'lokasi' => 'sometimes|string',
            'tipe_magang' => 'sometimes|string',
            'durasi' => 'sometimes|string',
            'kuota' => 'sometimes|integer|min:1',
            'deadline' => 'sometimes|date|after:today',
            'status_lowongan' => 'sometimes|string',
        ];
    }
}
