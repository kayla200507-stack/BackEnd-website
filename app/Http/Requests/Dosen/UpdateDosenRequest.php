<?php

namespace App\Http\Requests\Dosen;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDosenRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'nip' => 'sometimes|string|unique:dosens,nip,' . $this->route('dosen'),
            'fakultas' => 'sometimes|string',
            'bidang_keahlian' => 'sometimes|string',
        ];
    }
}
