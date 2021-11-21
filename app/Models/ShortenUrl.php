<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortenUrl extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'alias',
        'destination_url',
    ];

    public function getShortenUrlAttribute()
    {
        return route('url-shortener', $this->alias);
    }
}
