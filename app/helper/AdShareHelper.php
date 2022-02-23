<?php

namespace Aijkl\AdShare;

// クラス間の依存を無くすとわかりやすい
// 基本的にクラス間の依存はしないけど、このクラスが例外
use Dotenv\Dotenv;
class AdShareHelper
{
    static function isNullOrEmpty($obj): bool
    {
        if($obj === 0 || $obj === "0"){
            return false;
        }

        return empty($obj);
    }

    static function getLanguageCode(string $defaultLanguage = ConstParameters::DEFAULT_LANG_CODE): string
    {
        $languageCode = self::asStringOrEmpty($_COOKIE,ConstParameters::DEFAULT_LANG_CODE);
        if(AdShareHelper::isNullOrEmpty($languageCode))
        {
            return $defaultLanguage;
        }
        return $languageCode;
    }

    static function createDataBase(): AdShareDataBase
    {
        Dotenv::createImmutable(__DIR__)->load();
        return new AdShareDataBase("{$_ENV['DB_CONNECTION']}:dbname={$_ENV['DB_DATABASE']};host={$_ENV['DB_HOST']};port={$_ENV['DB_PORT']}",$_ENV['DB_USERNAME'],$_ENV['DB_PASSWORD']);
    }

    static function checkFormatMail(Phrase $phrase, $receivedMail, Response &$response) :bool
    {
        if(AdShareHelper::isNullOrEmpty($receivedMail))
        {
            $response = new Response(false,400, $phrase->mailRequireError);
            return false;
        }
        if(strlen($receivedMail) > ConstParameters::MAIL_MAX)
        {
            $response = new Response(false,400, $phrase->mailMaxError);
            return false;
        }
        if(strlen($receivedMail) < ConstParameters::MAIL_MIN)
        {
            $response = new Response(false,400, $phrase->mailMinError);
            return false;
        }

        return true;
    }

    static function checkFormatPassword(Phrase $phrase, $receivedPassword, Response &$response) :bool
    {
        if(AdShareHelper::isNullOrEmpty($receivedPassword))
        {
            $response = new Response(false,400, $phrase->passwordRequireError);
            return false;
        }
        if(strlen($receivedPassword) > ConstParameters::PASSWORD_MAX)
        {
            $response = new Response(false,400, $phrase->passwordMaxError);
            return false;
        }
        if(strlen($receivedPassword) < ConstParameters::PASSWORD_MIN)
        {
            $response = new Response(false,400, $phrase->passwordMinError);
            return false;
        }

        return true;
    }

    static function asStringOrEmpty($value, string $key) : string
    {
        if(isset($value[$key])) return $value[$key];
        return "";
    }
}