<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'alamat',
        'no_telepon',
        'tanggal_lahir',
        'foto',
    ];

    // profile → user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

