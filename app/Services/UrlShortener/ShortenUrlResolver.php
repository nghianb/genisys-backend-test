<?php

namespace App\Services\UrlShortener;

use App\Models\ShortenUrl;

class ShortenUrlResolver
{
    protected $shortenUrl;

    public function __construct(ShortenUrl $shortenUrl)
    {
        $this->shortenUrl = $shortenUrl;
    }

    public function resolve($alias)
    {
        return $this->shortenUrl->where('alias', $alias)
            ->firstOrFail();
    }
}