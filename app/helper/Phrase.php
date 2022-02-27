<?php
namespace Aijkl\AdShare;
class Phrase
{
    public string $langCode;

    public string $passwordMinError;
    public string $passwordMaxError;
    public string $nameMinError;
    public string $nameMaxError;
    public string $mailMinError;
    public string $mailMaxError;

    public string $authBadParameter;
    public string $userExitsError;

    public string $passwordRequireError;
    public string $mailRequireError;
    public string $nameRequireError;

    public string $mail;
    public string $password;
    public string $newRegister;
    public string $rememberMeText;

    public string $passwordPlaceHolder;
    public string $mailPlaceHolder;
    public string $namePlaceHolder;

    public string $signInButton;
    public string $signUpButton;

    public string $badRequestTitle;
    public string $searchTitle;
    public string $homeTitle;
    public string $landingPageTitle;
    public string $notFoundTitle;
    public string $signInTitle;
    public string $signUpTitle;

    function __construct(string $langCode)
    {
        $this->langCode = $langCode;
    }

    public function getLangCode(): string
    {
        return $this->langCode;
    }
}