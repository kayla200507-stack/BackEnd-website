<?php

namespace App\Http\Requests\Pengumuman;

use Illuminate\Foundation\Http\FormRequest;

class StorePengumumanRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'id_admin' => 'required|exists:admins,id_admin',
            'judul' => 'required|string|max:255',
            'isi_pengumuman' => 'required|string',
            'tanggal_publish' => 'required|date',
        ];
    }
}
