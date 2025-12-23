<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'username',
        'password_hash',
        'role',
        'sales_id',
    ];

    protected $hidden = [
        'password_hash',
        'remember_token',
    ];

    protected $casts = [
        'sales_id' => 'integer',
    ];

    // Penting: agar auth pakai kolom password_hash
    public function getAuthPassword()
    {
        return $this->password_hash;
    }

    // Opsional: auto-hash saat set password_hash
    public function setPasswordHashAttribute($value)
    {
        if (!$value) return;

        $this->attributes['password_hash'] =
            Hash::needsRehash($value) ? Hash::make($value) : $value;
    }

    public function sales()
    {
        return $this->belongsTo(Sales::class, 'sales_id', 'sales_id');
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    // Helper Method
    public function isAdmin()
    {
        // Asumsi kolom role di database berisi 'admin'
        return $this->role === 'admin';
    }

    public function isSales()
    {
        // Asumsi kolom role di database berisi 'sales'
        return $this->role === 'sales';
    }

    // Relasi ke Sales Profile
    public function salesProfile()
    {
        return $this->hasOne(Sales::class, 'user_id'); // Sesuaikan foreign key jika perlu
    }
}
