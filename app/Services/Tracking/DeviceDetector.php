<?php

namespace App\Services\Tracking;

use App\Models\Device;
use Illuminate\Http\Request;

class DeviceDetector
{
    protected $device;
    protected $agentParser;

    public function __construct(
        Device $device,
        AgentParser $agentParser
    ) {
        $this->device = $device;
        $this->agentParser = $agentParser;
    }

    public function detect(Request $request)
    {
        $agent = $this->agentParser->parse($request);

        return $this->device->updateOrCreate([
            'kind' => $agent->isDesktop() ? 'desktop' : ($agent->isMobile() ? 'mobile' : 'tablet'),
            'model' => $agent->device(),
            'platform' => $agent->platform(),
            'platform_version' => $agent->version($agent->platform()),
            'is_mobile' => $agent->isMobile(),
        ]);
    }
}