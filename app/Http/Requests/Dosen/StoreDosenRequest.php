<?php

namespace App\Http\Requests\Dosen;

use Illuminate\Foundation\Http\FormRequest;

class StoreDosenRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'id_user' => 'required|exists:users,id_user',
            'nip' => 'required|string|unique:dosens,nip',
            'fakultas' => 'required|string',
            'bidang_keahlian' => 'required|string',
        ];
    }
}
