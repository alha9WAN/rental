<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriVoucher extends Model
{
    use HasFactory;

    protected $table = 'kategori_vouchers';

    protected $fillable = [
        'nama',
        'deskripsi',
    ];

    public function vouchers()
    {
        return $this->hasMany(Voucher::class, 'kategori_id');
    }
}