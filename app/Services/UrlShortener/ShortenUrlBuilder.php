<?php

namespace App\Services\UrlShortener;

use App\Models\ShortenUrl;

class ShortenUrlBuilder
{
    protected $user;
    protected $alias;
    protected $destinationUrl;

    protected $aliasGenerator;

    public function __construct(
        AliasGenerator $aliasGenerator
    ) {
        $this->aliasGenerator = $aliasGenerator;
    }

    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    public function useAlias($alias)
    {
        $this->alias = $alias;

        return $this;
    }

    public function setDestinationUrl($destinationUrl)
    {
        $this->destinationUrl = $destinationUrl;

        return $this;
    }

    public function make()
    {
        return ShortenUrl::create([
            'user_id' => optional($this->user)->id,
            'alias' => $this->alias ?? $this->aliasGenerator->generate(),
            'destination_url' => $this->destinationUrl
        ]);
    }
}
