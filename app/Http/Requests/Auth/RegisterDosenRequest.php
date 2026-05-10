<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterDosenRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            // User fields
            'nama' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'no_telp' => 'nullable|string|max:20',
            
            // Dosen fields
            'nip' => 'required|string|unique:dosens,nip',
            'fakultas' => 'required|string',
            'bidang_keahlian' => 'required|string',
        ];
    }
}
