<?php

namespace App\Http\Requests\Lowongan;

use Illuminate\Foundation\Http\FormRequest;

class StoreLowonganRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'id_kategori' => 'required|exists:kategori_lowongans,id_kategori',
            'judul_lowongan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string',
            'tipe_magang' => 'required|string',
            'durasi' => 'required|string',
            'kuota' => 'required|integer|min:1',
            'deadline' => 'required|date|after:today',
            'status_lowongan' => 'required|string',
        ];
    }
}
