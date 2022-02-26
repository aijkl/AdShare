<?php

namespace Aijkl\AdShare;
class Components
{
    static function GlobalNavigation(UserEntity $userEntity = null)
    {
        return require __DIR__ . "/global-navigation.php";
    }
    static function InnerHed(string $title)
    {
        return require __DIR__ . "/head-inner-common.php";
    }
    static function Footer()
    {
        return require __DIR__ . "/footer.php";
    }
}