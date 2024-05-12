<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klinik_About extends Model
{
    use HasFactory;

    protected $table = 'klinikabouts';

    protected $fillable = [
        'username',
        'email',
        'nama_klinik',
        'alamat_lengkap',
        'kecamatan',
        'kabupaten',
        'kode_pos',
        'whatsapp',
        'telephone',
        'instagram',
        'facebook',
        'website',
        'tentangklinik',
        'upload_gambar',
    ];

    // protected $casts = [
    //     'social_media' => 'array', // Mengubah tipe data kolom social_media menjadi array
    // ];
}
