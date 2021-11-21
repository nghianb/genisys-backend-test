<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'kind',
        'model',
        'platform',
        'platform_version',
        'is_mobile'
    ];

    protected $casts = [
        'is_mobile' => 'boolean'
    ];
}
