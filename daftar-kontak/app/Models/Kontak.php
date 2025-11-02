<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_lengkap', 
        'nomor_telepon',
        'email',
        'alamat'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}