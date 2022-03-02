<?php

// Phpなんでnameofないの...
// C#最高!!!!!!
namespace Aijkl\AdShare;
use JetBrains\PhpStorm\Pure;

class EntityConverter
{
    #[Pure] static function convertToUserEntity(array $array): UserEntity
    {
        return new UserEntity($array["id"], $array["name"], $array["mail"],$array["icon_image_id"],$array["password_sha256"]);
    }

    #[Pure] static function convertToUserProfile(array $array): UserProfileEntity
    {
        return new UserProfileEntity($array["id"],$array["name"],$array["icon_image_id"]);
    }

    #[Pure] static function convertToAdviceEntity(array $sqlResult, array|null $tags, array|null $imageIds): AdviceEntity
    {
        return new AdviceEntity($sqlResult['id'],$sqlResult['body'],$sqlResult['target'],$sqlResult["likes"],$tags,$imageIds,$sqlResult['author_id'],$sqlResult['valid']);
    }
}