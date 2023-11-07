<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usaha extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_usaha',
        'nama_usaha',
        'pemilik_usaha',
    ];

    public function hasil()
    {
        return $this->hasOne(Hasil::class);
    }
}
