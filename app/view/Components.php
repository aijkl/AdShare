<?php

namespace Aijkl\AdShare;
use Ginq;

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

    static function advices(Phrase $phrase,array $adviceEntities,array $userProfiles)
    {
        $adviceUIModels = Ginq::from($adviceEntities)->select(function ($x) use($userProfiles)
        {
            $x->body = nl2br(htmlspecialchars($x->body));
            $userProfile = Ginq::from($userProfiles)->where(function ($y) use($x)
            {
                return $y->userId == $x->authorId;
            })->first();
            $userProfile->uesrName = htmlspecialchars($userProfile->userName);
            return new AdviceUIModel($x,$userProfile);
        })->toArray();
        return require __DIR__ . "/advices.php";
    }
}