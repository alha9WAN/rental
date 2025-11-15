<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;

    protected $table = 'mobils';

    protected $fillable = [
        'kategori_id',
        'nama',
        'slug',
        'harga_per_hari',
        'tipe',
        'kursi',
        'rating',
        'status',
        'lokasi',
        'vendor',
        'inisial_vendor',
        'whatsapp',
        'deskripsi',
        'gambar',
        // tambahan
        'fitur',
        'tagline'
    ];

    public function mobilKategori()
    {
        return $this->belongsTo(KategoriMobil::class, 'kategori_id');
    }

  // Akses fitur dalam bentuk array (otomatis decode JSON)
    protected $casts = [
        'fitur' => 'array',
    ];

}
