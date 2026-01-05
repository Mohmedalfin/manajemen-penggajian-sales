<?php

namespace App\Http\Requests\Sales;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Ubah ke true karena user sudah login (auth middleware)
        return true; 
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'nama_lengkap'  => 'required|string|max:255',
            'kontak'    => 'required|string|max:20',
            'alamat'        => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'foto'          => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    /**
     * (Opsional) Custom pesan error bahasa Indonesia
     */
    public function messages(): array
    {
        return [
            'nama_lengkap.required' => 'Nama lengkap wajib diisi.',
            'kontak.required'   => 'Nomor telepon wajib diisi.',
            'alamat.required'       => 'Alamat wajib diisi.',
            'tanggal_lahir.required'=> 'Tanggal lahir wajib diisi.',
            'foto.image'            => 'File harus berupa gambar.',
            'foto.max'              => 'Ukuran foto maksimal 2MB.',
        ];
    }
}