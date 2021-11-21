<?php

namespace App\Services\Tracking;

use App\Models\GeoLocation;
use GeoIp2\Database\Reader;
use GeoIp2\Exception\AddressNotFoundException;
use Illuminate\Http\Request;

class GeoLocationDetector
{
    protected $geoLocation;

    public function __construct(GeoLocation $geoLocation)
    {
        $this->geoLocation = $geoLocation;
    }

    public function detect($ip)
    {
        try {
            $reader = new Reader(storage_path('geo/GeoLite2-City.mmdb'));
            $record = $reader->city($ip);

            return $this->geoLocation->updateOrCreate([
                'latitude' => $record->location->latitude,
                'longitude' => $record->location->longitude,
                'country_code' => $record->country->isoCode,
                'country_code3' => null,
                'country_name' => $record->country->name,
                'region' => $record->continent->code,
                'city' => $record->city->name,
                'postal_code' => $record->postal->code,
                'area_code' => null,
                'dma_code' => null,
                'metro_code' => $record->location->metroCode,
                'continent_code' => $record->continent->code,
            ]);
        } catch (AddressNotFoundException $exception) {
            return null;
        }        
    }
}