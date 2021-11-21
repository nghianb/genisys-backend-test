<?php

namespace App\Services\Tracking;

use App\Models\Agent;
use Illuminate\Http\Request;

class AgentDetector
{
    protected $agent;
    protected $agentParser;

    public function __construct(
        Agent $agent,
        AgentParser $agentParser
    ) {
        $this->agent = $agent;
        $this->agentParser = $agentParser;
    }

    public function detect(Request $request)
    {
        $userAgent = $this->agentParser->parse($request);

        return $this->agent->updateOrCreate([
            'name' => $request->userAgent(),
            'browser' => $userAgent->browser(),
            'browser_version' => $userAgent->version($userAgent->browser())
        ]);
    }
}