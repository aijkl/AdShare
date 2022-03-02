<?php

namespace Aijkl\AdShare;
class UserEntity
{
    public string $id;
    public string $name;
    public string $mail;
    public string|null $iconImageId;
    public string $passwordSha256;

    public function __construct(string $id, string $name, string $mail,string|null $iconImageId,string $passwordSha256)
    {
        $this->id = $id;
        $this->name = $name;
        $this->mail = $mail;
        $this->iconImageId = $iconImageId;
        $this->passwordSha256 = $passwordSha256;
    }
}