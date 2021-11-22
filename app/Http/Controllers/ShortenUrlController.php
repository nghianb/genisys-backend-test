<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShortenUrlRequest;
use App\Models\ShortenUrl;
use App\Services\UrlShortener\ShortenUrlBuilder;
use Illuminate\Http\Request;

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

        return redirect()->route('shorten-urls.show', $shortentUrl);
    }

    public function show(ShortenUrl $shortenUrl)
    {
        return view('shorten-urls.show', compact('shortenUrl'));
    }
}
