<?php

namespace Aijkl\AdShare;

class CreateAdviceRequest
{
    public string $target;
    public string $body;
    /**
     * @var string[] $tags
     */
    public array $tags;

    public function __construct(string $target, string $body, array $tags)
    {
        $this->target = $target;
        $this->body = $body;
        $this->tags = $tags;
    }
}