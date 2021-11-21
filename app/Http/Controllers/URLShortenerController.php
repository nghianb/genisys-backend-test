<?php

namespace App\Http\Controllers;

use App\Services\Tracking\Tracker;
use App\Services\UrlShortener\ShortenUrlResolver;
use Illuminate\Http\Request;

class URLShortenerController extends Controller
{
    protected $tracker;
    protected $shortenUrlResolver;

    public function __construct(
        Tracker $tracker,
        ShortenUrlResolver $shortenUrlResolver
    ){
        $this->tracker = $tracker;
        $this->shortenUrlResolver = $shortenUrlResolver;
    }
    
    public function __invoke($alias, Request $request)
    {
        $shortenUrl = $this->shortenUrlResolver->resolve($alias);

        $visitor = $this->tracker->track($request);

        if ($visitor) {
            $shortenUrl->visitors()->attach($visitor);
        }

        return $this->redirectWithAdditionalRequestParams(
            $shortenUrl->destination_url,
            $request->query()
        );
    }

    protected function redirectWithAdditionalRequestParams(
        $destinationUrl,
        array $additionalRequestParams
    ) {
        $query = parse_url($destinationUrl, PHP_URL_QUERY);

        if ($query) {
            $destinationUrl .= '&'.http_build_query($additionalRequestParams);
        } else {
            $destinationUrl .= '?'.http_build_query($additionalRequestParams);
        }

        return redirect($destinationUrl);
    }
}
