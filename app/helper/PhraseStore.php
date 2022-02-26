<?php
namespace Aijkl\AdShare;
use InvalidArgumentException;

class PhraseStore
{
    private static PhraseStore $instance;
    private array $phrases;

    function __construct()
    {
        $jp  = new Phrase("ja");
        $jp->authBadParameter = "認証情報が正しくありません！";
        $jp->userExitsError = "お使いのメールアドレスは既に存在しています！";
        $jp->passwordMinError = "パスワードは".ConstParameters::PASSWORD_MIN."文字以上にしてください";
        $jp->passwordMaxError = "パスワードは".ConstParameters::PASSWORD_MAX."文字以下にしてください";
        $jp->nameMinError = "名前は".ConstParameters::NAME_MIN."文字以上にしてください";
        $jp->nameMaxError = "名前は".ConstParameters::NAME_MAX."文字以下にしてください";
        $jp->mailMinError = "メールは".ConstParameters::MAIL_MIN."文字以上にしてください";
        $jp->mailMaxError = "メールは".ConstParameters::MAIL_MAX."文字以下にしてください";
        $jp->passwordPlaceHolder = "パスワード";
        $jp->mailPlaceHolder = "メール";
        $jp->namePlaceHolder = "名前";
        $jp->passwordRequireError = "パスワードは必須です";
        $jp->mailRequireError = "メールは必須です";
        $jp->nameRequireError = "名前は必須です";

        $jp->signInButton = "ログイン";
        $jp->signUpTitle = "新規登録";

        $jp->mail = "メールアドレス";
        $jp->password = "パスワード";
        $jp->newRegister = "新規登録";
        $jp->rememberMeText = "ログインを保持する";

        $jp->searchTitle = "Search";
        $jp->homeTitle = "Home";
        $jp->notFoundTitle = "Not Found";
        $jp->signInTitle = "Sign In";
        $jp->signUpTitle = "Sign Up";
        $jp->landingPageTitle = "Welcome";

        $this->phrases = array($jp);
    }

    static function getInstance(): PhraseStore
    {
        if(isset($instance) == false){
            $instance = new PhraseStore();
        }
        return $instance;
    }

    /// AdShareHelper::getLanguageCode()
    /// クラス間の依存を無くしたいのでDefault引数にはしないけどGetLanguageCodeを使う
    function getPhrase(string $langCode): Phrase
    {
        $phrases = array_filter($this->phrases,function($value) use ($langCode)
        {
            return $value->langCode == $langCode;
        });

        if(count($phrases) != 1)
        {
            throw new InvalidArgumentException();
        }

        return $phrases[0];
    }
}