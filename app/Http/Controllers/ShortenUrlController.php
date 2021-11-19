<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShortenUrlRequest;
use App\Models\ShortenUrl;

class ShortenUrlController extends Controller
{
    public function store(StoreShortenUrlRequest $request)
    {
        $shortentUrl = ShortenUrl::create($request->validated());

        return redirect()->route('shorten-urls.show', $shortentUrl);
    }

    public function show(ShortenUrl $shortenUrl)
    {
        return view('shorten-urls.show', compact('shortenUrl'));
    }
}
