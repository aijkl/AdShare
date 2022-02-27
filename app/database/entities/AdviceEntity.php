<?php

namespace Aijkl\AdShare;
class AdviceEntity
{
    function __construct(string $id,string $body,string $target,string $authorId,string $valid)
    {
        $this->id = $id;
        $this->body = $body;
        $this->authorId = $authorId;
        $this->target = $target;

        $this->valid = $valid;
    }

    public string $id;
    public string $body;
    public string $target;
    public string $authorId;
    public bool $valid;
}