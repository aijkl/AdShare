<?php

use Aijkl\AdShare\AdShareHelper;
use Aijkl\AdShare\ConstParameters;
use Aijkl\AdShare\PhraseStore;
use Aijkl\AdShare\Views;

require_once '../app/vendor/autoload.php';
$router = new AltoRouter();

try
{
    $router->map('POST', '/api/auth/sign-in', function ()
    {
        require_once '../app/api/auth/sign-in.php';
    });
    $router->map('POST', '/api/auth/sign-up', function ()
    {
        require_once '../app/api/auth/sign-up.php';
    });

    $router->map('GET','/auth/sign-in',function ()
    {
        require_once '../app/view/sign-in-form.php';
    });
    $router->map('GET','/auth/sign-up',function ()
    {
        require_once '../app/view/sign-up-form.php';
    });

    $router->map('GET','@(index|home)',function ()
    {
        try
        {
            $phrase = PhraseStore::getInstance()->getPhrase(AdShareHelper::getLanguageCode());
            Views::Home($phrase,AdShareHelper::getUserFromCookie());
        }
        catch (Exception $exception)
        {
            require_once '../app/view/landing-page.php';
        }
    });

    $router->map('GET','/search',function ()
    {
        if(count($_GET) > 0)
        {
            $target = AdShareHelper::asStringOrEmpty($_GET,ConstParameters::TARGET);
            $body = AdShareHelper::asStringOrEmpty($_GET,ConstParameters::BODY);
            $tag = AdShareHelper::asStringOrEmpty($_GET,ConstParameters::TAG);

            if(AdShareHelper::isNullOrEmpty($target) && AdShareHelper::isNullOrEmpty($body) && AdShareHelper::isNullOrEmpty($tag))
            {
                $phrase = PhraseStore::getInstance()->getPhrase(AdShareHelper::getLanguageCode());
                Views::BadRequest($phrase);
                return;
            }

        }
        $phrase = PhraseStore::getInstance()->getPhrase(AdShareHelper::getLanguageCode());
        Views::Search($phrase,AdShareHelper::getUserFromCookie());
    });

    $router->map('GET','/test',function ()
    {
        $dataBase = AdShareHelper::createDataBase();
        $dataBase->searchAdvice(target: "就活生");
    });

    $match = $router->match();

    if ($match !== false)
    {
        if (is_callable($match['target']))
        {
            $match['target']();
        }
    }
    else
    {
        $phrase = PhraseStore::getInstance()->getPhrase(AdShareHelper::getLanguageCode());
        Views::NotFound($phrase);
        header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    }
}
catch (Exception $exception)
{
    echo $exception->getMessage();
    echo $exception->getTraceAsString();
    header($_SERVER["SERVER_PROTOCOL"] . "500 Internal Server Error");
}