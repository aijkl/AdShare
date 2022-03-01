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
            Views::home($phrase,AdShareHelper::getUserFromCookie());
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
            parse_str(parse_url($_SERVER['REQUEST_URI'])['query'],$pursedQuery);

            if(AdShareHelper::isNullOrEmpty($target) && AdShareHelper::isNullOrEmpty($body) && $tags == null)
            {
                $phrase = PhraseStore::getInstance()->getPhrase(AdShareHelper::getLanguageCode());
                Views::badRequest($phrase);
                return;
            }

            $dataBase = AdShareHelper::createDataBase();
            $phrase = PhraseStore::getInstance()->getPhrase(AdShareHelper::getLanguageCode());
            $adviceEntities = $dataBase->searchAdvice(target: $target,body: $body,tags: $tags);
            if($adviceEntities === false)
            {
                Views::notFound($phrase);
            }
            print_r($adviceEntities);
            print_r($tags);
            return;
        }
        $phrase = PhraseStore::getInstance()->getPhrase(AdShareHelper::getLanguageCode());
        Views::search($phrase,AdShareHelper::getUserFromCookie());
    });

    $router->map('GET','/test',function ()
    {
        $dataBase = AdShareHelper::createDataBase();
        $dataBase->searchAdvice(target: "基本");
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
        Views::notFound($phrase);
        header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    }
}
catch (Exception $exception)
{
    echo $exception->getMessage();
    echo $exception->getTraceAsString();
    header($_SERVER["SERVER_PROTOCOL"] . "500 Internal Server Error");
}