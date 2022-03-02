<?php

namespace Aijkl\AdShare;
class AdviceEntity
{
    public const COLUMN_ID = "id";
    public const COLUMN_BODY = "body";
    public const COLUMN_TARGET = "target";
    public const COLUMN_LIKES = "likes";
    public const COLUMN_AUTHOR_ID = "author_id";
    public const COLUMN_VALID = "valid";

    function __construct(string $id,string $body,string $target,int $likes,array|null $tags,array|null $imageIds,string $authorId,bool $valid = true)
    {
        $this->id = $id;
        $this->body = $body;
        $this->authorId = $authorId;
        $this->target = $target;
        $this->likes = $likes;
        $this->tags = $tags;
        $this->imageIds = $imageIds;
        $this->valid = $valid;
    }

    public string $id;
    public string $body;
    public string $target;
    public int $likes;
    public string $authorId;
    public array|null $tags;
    public array|null $imageIds;
    public bool $valid;
}