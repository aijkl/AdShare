<?php

// Phpなんでnameofないの...
// C#最高!!!!!!
namespace Aijkl\AdShare;
class EntityConverter
{
    static function ConvertToUserEntity(array $array): UserEntity
    {
        return new UserEntity($array["id"], $array["name"], $array["mail"],$array["icon_image_id"],$array["password_sha256"]);
    }

    static function ConvertToUserProfile(array $array): UserProfileEntity
    {
        return new UserProfileEntity($array["id"],$array["name"],$array["icon_image_id"]);
    }
}