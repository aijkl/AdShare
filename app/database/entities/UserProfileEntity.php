<?php

namespace Aijkl\AdShare;

class UserProfileEntity
{
    public const COLUMN_ID = "id";
    public const COLUMN_NAME = "name";

    public string $userName;
    public string $userId;
    public string|null $iconImageId;

    public function __construct(string $userId,string $userName,string|null $iconImageId)
    {
        $this->userId = $userId;
        $this->userName = $userName;
        $this->iconImageId = $iconImageId;
    }
}