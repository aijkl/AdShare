<?php
namespace Aijkl\AdShare;
class Phrase
{
    public string $langCode;

    public string $PasswordMinError;
    public string $PasswordMaxError;
    public string $NameMinError;
    public string $NameMaxError;


    public string $Mail;
    public string $Password;
    public string $NewRegister;

    public string $PasswordPlaceHolder;
    public string $MailPlaceHolder;
    public string $NamePlaceHolder;

    public string $LoginTitle;

    function __construct(string $langCode)
    {
        $this->langCode = $langCode;
    }

    /**
     * @return string
     */
    public function getLangCode(): string
    {
        return $this->langCode;
    }
}