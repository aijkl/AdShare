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

        $jp->targetMaxError = "対象は".ConstParameters::TARGET_MAX."文字以下にしてください";
        $jp->targetMinError = "対象は".ConstParameters::TARGET_MIN."文字以上にしてください";
        $jp->bodyMaxError = "本文は".ConstParameters::BODY_MAX."文字以下にしてください";
        $jp->bodyMinError = "本文は".ConstParameters::BODY_MIN."文字以上にしてください";
        $jp->tagElementMaxError = "タグは".ConstParameters::TAG_ELEMENT_MAX."文字以下にしてください";
        $jp->tagElementMinError = "タグは".ConstParameters::TAG_ELEMENT_MIN."文字以上にしてください";
        $jp->tagCountMaxError = "タグは".ConstParameters::TAG_ELEMENT_MAX."個以下にしてください";

        $jp->passwordPlaceHolder = "パスワード";
        $jp->mailPlaceHolder = "メール";
        $jp->namePlaceHolder = "名前";

        $jp->passwordRequireError = "パスワードは必須です";
        $jp->mailRequireError = "メールは必須です";
        $jp->nameRequireError = "名前は必須です";

        $jp->targetRequireError = "対象は必須です";
        $jp->bodyRequireError = "本文は必須です";

        $jp->signInButton = "ログイン";

        $jp->mail = "メールアドレス";
        $jp->password = "パスワード";
        $jp->newRegister = "新規登録";
        $jp->rememberMeText = "ログインを保持する";
        $jp->targetPlaceHolder = "学生";
        $jp->bodyPlaceHolder = "基本情報";
        $jp->tagPlaceHolder = "HAL 向上";

        $jp->recentPostsText = "最近の投稿";

        $jp->tagLabel = "タグ";
        $jp->bodyLabel = "本文";
        $jp->targetLabel = "対象";

        $jp->searchTitle = "検索";
        $jp->createAdviceTitle = "投稿";
        $jp->badRequestTitle = "Bad Request";
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