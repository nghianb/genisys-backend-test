<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeoLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'latitude',
        'longitude',
        'country_code',
        'country_code3',
        'country_name',
        'region',
        'city',
        'postal_code',
        'area_code',
        'dma_code',
        'metro_code',
        'continent_code',
    ];
}
