<?php

namespace Aijkl\AdShare;
class Components
{
    static function globalNavigation(UserEntity $userEntity = null)
    {
        return require __DIR__ . "/global-navigation.php";
    }
    static function innerHead(string $title)
    {
        return require __DIR__ . "/head-inner-common.php";
    }
    static function footer()
    {
        return require __DIR__ . "/footer.php";
    }

    static function search(Phrase $phrase, UserEntity $userEntity = null)
    {
        return require __DIR__ . "/search.php";
    }

    /**
     * @param AdviceUIModel[] $adviceUIModels
     */
    static function advices(Phrase $phrase,array $adviceUIModels)
    {
        return require __DIR__ . "/advices.php";
    }
}