<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $table = 'vouchers';

    protected $fillable = [
        'kategori_id',
        'nama',
        'slug',
        'diskon',
        'deskripsi',
        'berlaku_hingga',
        'status',
        'whatsapp',
        'gambar',
    ];

    public function kategoriVoucher()
    {
        return $this->belongsTo(KategoriVoucher::class, 'kategori_id');
    }
}
