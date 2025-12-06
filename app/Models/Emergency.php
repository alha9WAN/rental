<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emergency extends Model
{
    protected $fillable = [
         //   step 1
        'unique_id',
        'name',
        'email',
        'phone',
        'nationality',
        'location',
        'urgency',
        'language',
        'assistance_type',
        'description',
        'people_count',
         // step 2
        'total_payment',
        'payment_proof',
    ];

    protected $casts = [
        'assistance_type' => 'array',
    ];
}
