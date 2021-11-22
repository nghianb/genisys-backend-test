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

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    public function geoLocation()
    {
        return $this->belongsTo(GeoLocation::class);
    }
}
