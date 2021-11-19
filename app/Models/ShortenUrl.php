<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Hashids\Hashids;

class ShortenUrl extends Model
{
    use HasFactory;

    protected $fillable = [
        'destination_url',
    ];

    public function getHashIdAttribute()
    {
        $hashids = new Hashids();

        return $hashids->encode($this->id);
    }

    public function getShortenUrlAttribute()
    {
        return route('url-shortener', $this->hashId);
    }
}
