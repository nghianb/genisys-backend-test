<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_id',
        'agent_id',
        'language_id',
        'device_id',
        'geo_location_id',
        'ip',
    ];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}
