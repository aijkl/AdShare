<?php

namespace Aijkl\AdShare;
use Ginq;

class Views
{
    static function searchForm(Phrase $phrase, UserEntity $userEntity = null)
    {
        require __DIR__ . "/search-form.php";
    }

    static function home(Phrase $phrase, UserEntity $userEntity = null)
    {
        require __DIR__ . "/home.php";
    }

    static function landingPage()
    {
        require __DIR__ . "/landing-page.php";
    }

    static function signInForm()
    {
        require __DIR__ . "/sign-in-form.php";
    }

    static function signUpForm()
    {
        require __DIR__ . "/sign-up-form.php";
    }

    static function createAdviceForm(Phrase $phrase)
    {
        require __DIR__ . "/create-advice-form.php";
    }

    /**
     * @param AdviceEntity[] $adviceEntities
     * @param UserProfileEntity[] $userProfiles
     */
    static function searchResult(Phrase $phrase,UserEntity|null $userEntity,array $adviceEntities,array $userProfiles)
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
        require __DIR__ . "/search-result.php";
    }

    static function showAdvice(Phrase $phrase,UserEntity|null $userEntity,AdviceEntity $adviceEntity,UserProfileEntity $userProfile)
    {
        $adviceEntity->body = nl2br(htmlspecialchars($adviceEntity->body));
        $userProfile->userName = htmlspecialchars($userProfile->userName);
        $adviceUIModels = array(new AdviceUIModel($adviceEntity,$userProfile));
        require __DIR__ . "/show-advice.php";
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