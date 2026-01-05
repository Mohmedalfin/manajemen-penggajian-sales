<?php

namespace App\Http\Requests\Sales;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdatePasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $userId = Auth::id();

        return [
            // PERBAIKAN: Cek unik ke tabel 'users'
            'username' => [
                'required', 
                'string', 
                'max:255', 
                'alpha_dash', 
                Rule::unique('users', 'username')->ignore($userId), 
            ],
            'current_password' => 'required',
            'password' => 'required|min:6|confirmed',
        ];
    }
    
    public function messages()
    {
        return [
            'username.unique' => 'Username ini sudah dipakai orang lain.',
            'username.alpha_dash' => 'Username tidak boleh mengandung spasi.',
            'current_password.required' => 'Kata sandi lama wajib diisi untuk keamanan.',
            'password.min' => 'Kata sandi baru minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi kata sandi baru tidak cocok.',
        ];
    } 
}
