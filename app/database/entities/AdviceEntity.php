<?php

namespace Aijkl\AdShare;
class AdviceEntity
{
    function __construct(string $id,string $text,string $authorId,string $valid)
    {
        $this->id = $id;
        $this->text = $text;
        $this->authorId = $authorId;
        $this->valid = $valid;
    }

    public string $id;
    public string $text;
    public string $authorId;
    public bool $valid;
}