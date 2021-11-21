<?php

namespace App\Services\Tracking;

use App\Models\Visitor;
use Illuminate\Http\Request;

class Tracker
{
    protected $visitor;
    protected $sessionDetector;
    protected $agentDetector;
    protected $deviceDetector;
    protected $languageDetector;
    protected $geoLocationDetector;

    public function __construct(
        Visitor $visitor,
        SessionDetector $sessionDetector,
        AgentDetector $agentDetector,
        DeviceDetector $deviceDetector,
        LanguageDetector $languageDetector,
        GeoLocationDetector $geoLocationDetector
    ) {
        $this->visitor = $visitor;
        $this->sessionDetector = $sessionDetector;
        $this->agentDetector = $agentDetector;
        $this->deviceDetector = $deviceDetector;
        $this->languageDetector = $languageDetector;
        $this->geoLocationDetector = $geoLocationDetector;
    }

    public function track(Request $request)
    {
        return $this->visitor->updateOrCreate([
            'session_id' => $this->sessionDetector->detect($request),
            'agent_id' => optional($this->agentDetector->detect($request))->id,
            'language_id' => optional($this->languageDetector->detect($request))->id,
            'device_id' => optional($this->deviceDetector->detect($request))->id,
            'geo_location_id' => optional($this->geoLocationDetector->detect($request->ip()))->id,
            'ip' => $request->ip(),
        ]);
    }
}