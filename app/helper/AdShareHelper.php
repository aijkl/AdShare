<?php

namespace Aijkl\AdShare;

// クラス間の依存を無くすとわかりやすい
// 基本的にクラス間の依存はしないけど、このクラスが例外
use AdShareDataBase;
use Dotenv\Dotenv;

class AdShareHelper
{
    static function IsNullOrEmpty($obj): bool
    {
        if($obj === 0 || $obj === "0"){
            return false;
        }

        return empty($obj);
    }

    static function GetLanguageCode(string $defaultLanguage = ConstParameters::DefaultLangCode): string
    {
        $languageCode = self::AsStringOrEmpty($_COOKIE,ConstParameters::DefaultLangCode);
        if(AdShareHelper::IsNullOrEmpty($languageCode))
        {
            return ConstParameters::DefaultLangCode;
        }
        return $languageCode;
    }

    static function CreateDataBase(): AdShareDataBase
    {
        Dotenv::createImmutable(__DIR__)->load();
        return new AdShareDataBase("${$_ENV['DB_CONNECTION']}:dbname=${$_ENV['DB_DATABASE']};host=${$_ENV['DB_CONNECTION']};port=${$_ENV['DB_PORT']}",$_ENV['DB_USERNAME'],$_ENV['DB_PASSWORD']);
    }

    static function CheckFormatMail(Phrase $phrase,$receivedMail,Response &$response) :bool
    {
        if(AdShareHelper::IsNullOrEmpty($receivedMail))
        {
            $response = new Response(false,400, $phrase->MailRequireError);
            return false;
        }
        if(strlen($receivedMail) > ConstParameters::MailMax)
        {
            $response = new Response(false,400, $phrase->MailMaxError);
            return false;
        }
        if(strlen($receivedMail) < ConstParameters::MailMin)
        {
            $response = new Response(false,400, $phrase->MailMinError);
            return false;
        }

        return true;
    }

    static function CheckFormatPassword(Phrase $phrase,$receivedPassword,Response &$response) :bool
    {
        if(AdShareHelper::IsNullOrEmpty($receivedPassword))
        {
            $response = new Response(false,400, $phrase->PasswordRequireError);
            return false;
        }
        if(strlen($receivedPassword) > ConstParameters::PasswordMax)
        {
            $response = new Response(false,400, $phrase->PasswordMaxError);
            return false;
        }
        if(strlen($receivedPassword) < ConstParameters::PasswordMin)
        {
            $response = new Response(false,400, $phrase->PasswordMinError);
            return false;
        }

        return true;
    }

    static function AsStringOrEmpty(array $postArray,string $key) : string
    {
        if(isset($postArray[$key])) return $postArray[$key];
        return "";
    }
}