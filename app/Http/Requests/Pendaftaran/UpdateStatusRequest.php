<?php

namespace App\Http\Requests\Pendaftaran;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStatusRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'status_pendaftaran' => 'required|string',
        ];
    }
}
