<?php

namespace Aijkl\AdShare;
use Ginq;

class Views
{
    static function searchForm(Phrase $phrase, UserEntity $userEntity = null)
    {
        require __DIR__ . "/search-form.php";
    }

    static function home(Phrase $phrase,array $adviceEntities,array $userProfiles,UserEntity $userEntity = null)
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

    static function createAdviceForm(Phrase $phrase,UserEntity $userEntity)
    {
        require __DIR__ . "/create-advice-form.php";
    }

    /**
     * @param AdviceEntity[] $adviceEntities
     * @param UserProfileEntity[] $userProfiles
     */
    static function searchResult(Phrase $phrase,UserEntity|null $userEntity,array $adviceEntities,array $userProfiles)
    {
        require __DIR__ . "/search-result.php";
    }

    static function showAdvice(Phrase $phrase,UserEntity|null $userEntity,AdviceEntity $adviceEntity,UserProfileEntity $userProfile)
    {
        $adviceEntities = array($adviceEntity);
        $userProfiles = array($userProfile);
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