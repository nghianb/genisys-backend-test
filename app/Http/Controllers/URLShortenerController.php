<?php

namespace App\Http\Controllers;

use App\Services\UrlShortener\ShortenUrlResolver;
use Illuminate\Http\Request;

class URLShortenerController extends Controller
{
    protected $shortenUrlResolver;

    public function __construct(
        ShortenUrlResolver $shortenUrlResolver
    ){
        $this->shortenUrlResolver = $shortenUrlResolver;
    }
    
    public function __invoke($alias, Request $request)
    {
        $shortenUrl = $this->shortenUrlResolver->resolve($alias);

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
