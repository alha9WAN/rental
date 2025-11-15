<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KategoriCarpool extends Model
{
     use HasFactory;

protected $table = 'kategori_carpools';

    protected $fillable = [
        'name',
        'deskripsi',
    ];

    public function carpoolKategori()
    {
        return $this->hasMany(Carpool::class, 'kategori_id');
    }
}