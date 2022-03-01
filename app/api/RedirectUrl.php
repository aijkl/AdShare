<?php

namespace Aijkl\AdShare;

class RedirectUrl
{
    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public string $url;
}