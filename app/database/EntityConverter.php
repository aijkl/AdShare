<?php

// Phpなんでnameofないの...
// C#最高!!!!!!
class EntityConverter
{
    static function ConvertToUserEntity(array $array): UserEntity
    {
        $userEntity = new UserEntity();
        $userEntity->Id = $array["id"];
        $userEntity->Mail = $array["mail"];
        $userEntity->PasswordSha256 = $array["password_sha256"];
        return $userEntity;
    }
}