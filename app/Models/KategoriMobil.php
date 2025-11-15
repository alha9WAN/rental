<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriMobil extends Model
{
    use HasFactory;

    protected $table = 'kategori_mobils';

    protected $fillable = [
        'nama',
        'deskripsi',
    ];

    /**
     */
    public function mobilKategori()
    {
        return $this->hasMany(Mobil::class, 'kategori_id');
    }
}
