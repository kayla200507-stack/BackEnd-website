<?php

namespace App\Http\Requests\Laporan;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStatusRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'status_review' => 'required|string',
        ];
    }
}
