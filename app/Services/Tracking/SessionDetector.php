<?php

namespace App\Services\Tracking;

use Illuminate\Cookie\CookieJar;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SessionDetector
{
    protected $cookieJar;

    public function __construct(CookieJar $cookieJar)
    {
        $this->cookieJar = $cookieJar;
    }

    public function detect(Request $request)
    {
        $visitorId = $request->cookie('visitor_id');

        if (!$visitorId) {
            $visitorId = Str::uuid();
            $this->cookieJar->queue('visitor_id', $visitorId, 0);
        }

        return $visitorId;
    }
}