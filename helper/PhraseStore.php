<?php
namespace Aijkl\AdShare;
class PhraseStore
{
    private static PhraseStore $instance;
    private array $phrases;

    function __construct()
    {
        $jp  = new Phrase("ja");
        $jp->PasswordMinError = "パスワードは".ConstParameters::PasswordMin."文字以上にしてください";
        $jp->PasswordMaxError = "パスワードは".ConstParameters::PasswordMax."文字以下にしてください";
        $jp->NameMinError = "名前は".ConstParameters::NameMin."以上にしてください";
        $jp->NameMaxError = "名前は".ConstParameters::NameMax."以下にしてください";
        $jp->PasswordPlaceHolder = "パスワード";
        $jp->MailPlaceHolder = "メール";
        $jp->NamePlaceHolder = "名前";

        $jp->NameMinError = "";
        $jp->Mail = "メールアドレス";
        $jp->Password = "パスワード";
        $jp->NewRegister = "新規登録";

        $phrases = array();
    }

    static function GetInstance(): PhraseStore
    {
        if(isset($instance) == false){
            $instance = new PhraseStore();
        }
        return $instance;
    }

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