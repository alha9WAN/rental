<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    protected $table = 'mitras';

    protected $fillable = [
        'nama',
        'alamat',
        'no_hp',
        'email',
        'nama_perusahaan',
        'jenis_kendaraan',
        'nama_kendaraan',
        'harga_sewa',
        'deskripsi',
        'status',
    ];

    protected $casts = [
        'harga_sewa' => 'decimal:2',
    ];
}