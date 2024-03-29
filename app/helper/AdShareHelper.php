<?php

namespace Aijkl\AdShare;

// クラス間の依存を無くすとわかりやすい
// 基本的にクラス間の依存はしないけど、このクラスが例外
use Dotenv\Dotenv;
use Ginq;

class AdShareHelper
{
    static function isNullOrEmpty($obj): bool
    {
        if($obj === 0 || $obj === "0"){
            return false;
        }

        return empty($obj);
    }

    /**
     * @throws UserNotAuthException
     * @throws UserNotFoundException
     * @throws TokenNotFoundException
     */
    static function getUserFromCookie(): UserEntity
    {
        $token = self::getStringOrEmpty($_COOKIE,ConstParameters::TOKEN);
        if(self::isNullOrEmpty($token))
        {
            throw new UserNotAuthException();
        }

        $dataBase = self::createDataBase();
        return $dataBase->getUserFromToken($token);
    }


    /**
     * @param AdviceEntity[] $adviceEntities
     * @return UserProfileEntity[]
     */
    static function getUserProfiles(AdShareDataBase $dataBase,array $adviceEntities,int $fallbackIconId = ConstParameters::DEFAULT_ICON_ID): array
    {
        return Ginq::from($adviceEntities)->select(function (AdviceEntity $x)
        {
            return $x->authorId;
        })->distinct()->select(function ($x) use ($dataBase,$fallbackIconId)
        {
            return $dataBase->getUserProfile($x,$fallbackIconId);
        })->toArray();
    }

    static function validateTokenFromCookie(): bool
    {
        $token = self::getStringOrEmpty($_COOKIE,ConstParameters::TOKEN);
        if(self::isNullOrEmpty($token))
        {
            return false;
        }

        $dataBase = self::createDataBase();
        return $dataBase->validateToken($token);
    }

    static function getLanguageCode(string $defaultLanguage = ConstParameters::DEFAULT_LANG_CODE): string
    {
        $languageCode = self::getStringOrEmpty($_COOKIE,ConstParameters::DEFAULT_LANG_CODE);
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
        if(mb_strlen($receivedMail) > ConstParameters::MAIL_MAX)
        {
            $response = new Response(false,400, $phrase->mailMaxError);
            return false;
        }
        if(mb_strlen($receivedMail) < ConstParameters::MAIL_MIN)
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
        if(mb_strlen($receivedPassword) > ConstParameters::PASSWORD_MAX)
        {
            $response = new Response(false,400, $phrase->passwordMaxError);
            return false;
        }
        if(mb_strlen($receivedPassword) < ConstParameters::PASSWORD_MIN)
        {
            $response = new Response(false,400, $phrase->passwordMinError);
            return false;
        }

        return true;
    }

    static function checkFormatName(Phrase $phrase, $receivedName, Response &$response) :bool
    {
        if(AdShareHelper::isNullOrEmpty($receivedName))
        {
            $response = new Response(false,400, $phrase->nameRequireError);
            return false;
        }
        if(mb_strlen($receivedName) > ConstParameters::NAME_MAX)
        {
            $response = new Response(false,400, $phrase->nameMaxError);
            return false;
        }
        if(mb_strlen($receivedName) < ConstParameters::NAME_MIN)
        {
            $response = new Response(false,400, $phrase->nameMinError);
            return false;
        }

        return true;
    }

    static function checkFormatTarget(Phrase $phrase, $receivedTarget, Response &$response) :bool
    {
        if(AdShareHelper::isNullOrEmpty($receivedTarget))
        {
            $response = new Response(false,400, $phrase->targetRequireError);
            return false;
        }
        if(mb_strlen($receivedTarget) > ConstParameters::TARGET_MAX)
        {
            $response = new Response(false,400,$phrase->targetMaxError);
            return false;
        }
        if(mb_strlen($receivedTarget) < ConstParameters::TARGET_MIN)
        {
            $response = new Response(false,400,$phrase->targetMinError);
            return false;
        }
        return true;
    }

    static function checkFormatBody(Phrase $phrase, $receivedBody, Response &$response) :bool
    {
        if(AdShareHelper::isNullOrEmpty($receivedBody))
        {
            $response = new Response(false,400, $phrase->bodyRequireError);
            return false;
        }
        if(mb_strlen($receivedBody) > ConstParameters::BODY_MAX)
        {
            $response = new Response(false,400,$phrase->bodyMaxError);
            return false;
        }
        if(mb_strlen($receivedBody) < ConstParameters::BODY_MIN)
        {
            $response = new Response(false,400,$phrase->bodyMinError);
            return false;
        }
        return true;
    }

    static function checkFormatTag(Phrase $phrase,array|null $receivedTags, Response &$response) :bool
    {
        if(AdShareHelper::isNullOrEmpty($receivedTags))
        {
            return true;
        }

        if(count($receivedTags) > ConstParameters::TAG_COUNT_MAX)
        {
            $response = new Response(false,400,$phrase->tagCountMaxError);
            return false;
        }

        return Ginq::from($receivedTags)->any(function ($x) use($phrase,&$response)
        {
            if(mb_strlen($x) > ConstParameters::TAG_ELEMENT_MAX)
            {
                $response = new Response(false,400,$phrase->tagElementMaxError);
                return false;
            }
            if(mb_strlen($x) < ConstParameters::TAG_ELEMENT_MIN)
            {
                $response = new Response(false,400,$phrase->tagElementMinError);
                return false;
            }
            return true;
        });
    }

    static function getStringOrEmpty(array $value, string $key) : string
    {
        if(isset($value[$key])) return $value[$key];
        return "";
    }

    static function getArrayOrNull(array $value, string $key) : array|null
    {
        if(isset($value[$key])) return $value[$key];
        return null;
    }

    static function getHashOrEmpty(array $value, string $key) : string
    {
        if(isset($value[$key])) return self::hash($value[$key]);
        return "";
    }

    static function hash($value) : string
    {
        return hash("sha256",$value);
    }
}