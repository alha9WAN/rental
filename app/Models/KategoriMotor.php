<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriMotor extends Model
{
    use HasFactory;

    protected $table = 'kategori_motors';

    protected $fillable = [
        'nama',
        'deskripsi',
    ];

    public function motors()
    {
        return $this->hasMany(Motor::class, 'kategori_id');
    }
}