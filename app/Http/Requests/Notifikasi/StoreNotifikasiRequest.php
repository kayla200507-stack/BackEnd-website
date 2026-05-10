<?php

namespace App\Http\Requests\Notifikasi;

use Illuminate\Foundation\Http\FormRequest;

class StoreNotifikasiRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'id_user' => 'required|exists:users,id_user',
            'judul' => 'required|string|max:255',
            'pesan' => 'required|string',
            'status_baca' => 'required|in:belum,sudah',
        ];
    }
}
