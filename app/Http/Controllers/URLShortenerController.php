<?php

namespace App\Http\Controllers;

use App\Services\UrlShortener\ShortenUrlResolver;

class URLShortenerController extends Controller
{
    protected $shortenUrlResolver;

    public function __construct(
        ShortenUrlResolver $shortenUrlResolver
    ){
        $this->shortenUrlResolver = $shortenUrlResolver;
    }
    
    public function __invoke($alias)
    {
        $shortenUrl = $this->shortenUrlResolver->resolve($alias);

        return redirect($shortenUrl->destination_url);
    }
}
