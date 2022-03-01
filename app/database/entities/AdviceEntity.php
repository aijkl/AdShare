<?php

namespace Aijkl\AdShare;
class AdviceEntity
{
    function __construct(string $id,string $body,string $target,array|null $tags,array|null $imageIds,string $authorId,bool $valid = true)
    {
        $this->id = $id;
        $this->body = $body;
        $this->authorId = $authorId;
        $this->target = $target;
        $this->tags = $tags;
        $this->imageIds = $imageIds;
        $this->valid = $valid;
    }

    public string $id;
    public string $body;
    public string $target;
    public string $authorId;
    public array|null $tags;
    public array|null $imageIds;
    public bool $valid;
}