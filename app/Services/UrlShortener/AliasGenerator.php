<?php

namespace App\Services\UrlShortener;

use App\Models\ShortenUrl;
use Hashids\Hashids;

class AliasGenerator
{
    protected $hashids;
    protected $shortenUrl;

    public function __construct(
        Hashids $hashids,
        ShortenUrl $shortenUrl
    ) {
        $this->hashids = $hashids;
        $this->shortenUrl = $shortenUrl;
    }

    public function generate()
    {
        $lastInsertedId = $this->getLastInsertedId();

        do {
            $lastInsertedId++;

            $alias = $this->hashids->encode($lastInsertedId);
        } while ($this->existsAlias($alias));

        return $alias;
    }

    protected function getLastInsertedId()
    {
        return $this->shortenUrl->max('id');
    }

    protected function existsAlias($alias)
    {
        return $this->shortenUrl->where('alias', $alias)
            ->exists();
    }
}