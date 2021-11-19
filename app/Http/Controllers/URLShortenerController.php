<?php

namespace App\Http\Controllers;

use App\Models\ShortenUrl;
use Hashids\Hashids;

class URLShortenerController extends Controller
{
    public function __invoke($hashId)
    {
        $hashids = new Hashids();
        $id = $hashids->decode($hashId)[0];

        $shortenUrl = ShortenUrl::findOrFail($id);

        return redirect($shortenUrl->destination_url);
    }
}
