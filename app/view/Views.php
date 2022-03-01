<?php

namespace Aijkl\AdShare;
use Ginq;

class Views
{
    static function search(Phrase $phrase, UserEntity $userEntity = null)
    {
        require __DIR__ . "/search.php";
    }
    static function home(Phrase $phrase, UserEntity $userEntity = null)
    {
        require __DIR__ . "/home.php";
    }

    /**
     * @param AdviceEntity[] $adviceEntities
     * @param UserProfileEntity[] $userProfiles
     */
    static function advices(Phrase $phrase,array $adviceEntities,array $userProfiles)
    {
        $adviceUIModels = Ginq::from($adviceEntities)->select(function ($x) use($userProfiles)
        {
            $userProfile = Ginq::from($userProfiles)->where(function ($y) use($x)
            {
                return $y->userId == $x->authorId;
            })->first();
            return new AdviceUIModel($x,$userProfile);
        })->toArray();
        require __DIR__ . "/advices.php";
    }
    static function notFound(Phrase $phrase)
    {
        require __DIR__ . "/not-found.php";
    }
    static function badRequest(Phrase $phrase)
    {
        require __DIR__ . "/bad-request.php";
    }
}