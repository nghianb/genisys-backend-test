<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShortenUrlRequest;
use App\Models\ShortenUrl;
use App\Services\UrlShortener\ShortenUrlBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\UnauthorizedException;

class ShortenUrlController extends Controller
{
    protected $shortenUrlBuilder;

    public function __construct(
        ShortenUrlBuilder $shortenUrlBuilder
    ) {
        $this->shortenUrlBuilder = $shortenUrlBuilder;
    }

    public function index(Request $request)
    {
        $user = $request->user();

        $shortenUrls = ShortenUrl::withCount('visits')
            ->where('user_id', $user->id)
            ->simplePaginate();

        return view('shorten-urls.index', compact('shortenUrls'));
    }

    public function store(StoreShortenUrlRequest $request)
    {
        $shortentUrl = $this->shortenUrlBuilder
            ->setUser($request->user())
            ->setDestinationUrl($request->input('destination_url'))
            ->make();

        if (!$request->user()) {
            $redirectUrl = URL::signedRoute('shorten-urls.show', $shortentUrl);

            return redirect($redirectUrl);
        }

        return redirect()->route('shorten-urls.show', $shortentUrl);
    }

    public function show(ShortenUrl $shortenUrl, Request $request)
    {
        if (!$request->user() && !$request->hasValidSignature()) {
            throw new UnauthorizedException();
        }

        return view('shorten-urls.show', compact('shortenUrl'));
    }
}
