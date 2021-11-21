<?php

namespace App\Services\Tracking;

use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class AgentParser
{
    protected $agent;

    public function __construct(Agent $agent)
    {
        $this->agent = $agent;
    }

    public function parse(Request $request)
    {
        $this->agent->setUserAgent($request->userAgent());

        return $this->agent;
    }
}