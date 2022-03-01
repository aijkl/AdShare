<?php

namespace Aijkl\AdShare;
class TokenEntity
{
    public const TABLE_NAME = 'tokens';
    public const COLUMN_USER_ID = 'user_id';
    public const COLUMN_TOKEN = 'token';
    public const COLUMN_ENABLE = 'enable';

    public string $userId;
    public string $token;
    public string $enable;

    public function __construct(string $userId, string $token, string $enable)
    {
        $this->userId = $userId;
        $this->token = $token;
        $this->enable = $enable;
    }
}