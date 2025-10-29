<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    use HasFactory;

    protected $table = 'motors';

    protected $fillable = [
        'kategori_id',
        'nama',
        'slug',
        'harga_per_hari',
        'tipe',
        'bahan_bakar',
        'rating',
        'status',
        'lokasi',
        'vendor',
        'inisial_vendor',
        'whatsapp',
        'deskripsi',
        'gambar',
    ];

    public function kategoriMotor()
    {
        return $this->belongsTo(KategoriMotor::class, 'kategori_id');
    }
}
