<?php
namespace Aijkl\AdShare;
use InvalidArgumentException;

namespace Aijkl\AdShare;

class PhraseStore
{
    private static PhraseStore $instance;
    private array $phrases;

    function __construct()
    {
        $jp  = new Phrase("ja");
        $jp->AuthBadParameter = "認証情報が正しくありません！";
        $jp->PasswordMinError = "パスワードは".ConstParameters::PasswordMin."文字以上にしてください";
        $jp->PasswordMaxError = "パスワードは".ConstParameters::PasswordMax."文字以下にしてください";
        $jp->NameMinError = "名前は".ConstParameters::NameMin."以上にしてください";
        $jp->NameMaxError = "名前は".ConstParameters::NameMax."以下にしてください";
        $jp->MailMinError = "メールは".ConstParameters::MailMin."以上にしてください";
        $jp->MailMaxError = "メールは".ConstParameters::MailMax."以下にしてください";
        $jp->PasswordPlaceHolder = "パスワード";
        $jp->MailPlaceHolder = "メール";
        $jp->NamePlaceHolder = "名前";
        $jp->PasswordRequireError = "パスワードは必須です";
        $jp->MailRequireError = "メールは必須です";

        $jp->Mail = "メールアドレス";
        $jp->Password = "パスワード";
        $jp->NewRegister = "新規登録";

        $jp->LoginTitle = "ログイン";

        $this->phrases = array($jp);
    }

    static function GetInstance(): PhraseStore
    {
        if(isset($instance) == false){
            $instance = new PhraseStore();
        }
        return $instance;
    }

    /// AdShareHelper::GetLanguageCode()
    /// クラス間の依存を無くしたいのでDefault引数にはしないけどGetLanguageCodeを使う
    function GetPhrase(string $langCode): Phrase
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