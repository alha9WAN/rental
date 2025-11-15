<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carpool extends Model
{
    use HasFactory;

    protected $table = 'carpools';
    protected $fillable = [
        'kategori_id',
        'nama_rute',
        'tagline',
        'slug',
        'harga_per_kursi',
        'deskripsi',
        'gambar',
        'lokasi_awal',
        'lokasi_tujuan',
        'jam_berangkat',
        'rating',
        'fitur',
        'whatsapp'
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriCarpool::class, 'kategori_id');
    }

    // Akses fitur dalam bentuk array (otomatis decode JSON)
    protected $casts = [
        'fitur' => 'array',
    ];
}
