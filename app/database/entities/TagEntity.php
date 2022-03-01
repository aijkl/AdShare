<?php

namespace Aijkl\AdShare;

class TagEntity
{
    public const ADVICE_ID = "advice_id";
    public const TEXT = "text";

    public string $adviceId;
    public string $text;

    public function __construct(string $adviceId, string $text)
    {
        $this->adviceId = $adviceId;
        $this->text = $text;
    }
}