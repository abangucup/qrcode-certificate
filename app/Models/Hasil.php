<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;

    protected $fillable = [
        'hasil_bakteri',
        'hasil_kimia',
        'hasil_fisik',
        'hasil_uji',
        'sertifikat_layak_sehat',
        'sertifikat_penjamak_makanan',
        'sertifikat_penjamak_pj',
        'hasil_pemeriksaan',
        'nib',
        'izin_usaha',
        'usaha_id'
    ];

    public function usaha()
    {
        return $this->belongsTo(Usaha::class);
    }
}
