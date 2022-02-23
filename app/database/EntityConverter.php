<?php

// Phpなんでnameofないの...
// C#最高!!!!!!
namespace Aijkl\AdShare;
class EntityConverter
{
    static function ConvertToUserEntity(array $array): UserEntity
    {
        $userEntity = new UserEntity();
        $userEntity->id = $array["id"];
        $userEntity->mail = $array["mail"];
        $userEntity->passwordSha256 = $array["password_sha256"];
        return $userEntity;
    }
}