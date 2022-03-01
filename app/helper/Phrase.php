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

    public string $targetMaxError;
    public string $targetMinError;
    public string $bodyMaxError;
    public string $bodyMinError;
    public string $tagElementMaxError;
    public string $tagElementMinError;
    public string $tagCountMaxError;

    public string $authBadParameter;
    public string $userExitsError;

    public string $passwordRequireError;
    public string $mailRequireError;
    public string $nameRequireError;
    public string $targetRequireError;
    public string $bodyRequireError;

    public string $mail;
    public string $password;
    public string $newRegister;
    public string $rememberMeText;

    public string $targetLabel;
    public string $bodyLabel;
    public string $tagLabel;

    public string $targetPlaceHolder;
    public string $bodyPlaceHolder;
    public string $tagPlaceHolder;
    public string $passwordPlaceHolder;
    public string $mailPlaceHolder;
    public string $namePlaceHolder;

    public string $signInButton;
    public string $signUpButton;

    public string $createAdviceTitle;
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