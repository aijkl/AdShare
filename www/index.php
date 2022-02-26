<?php

use Aijkl\AdShare\AdShareHelper;
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
        $phrase = PhraseStore::getInstance()->getPhrase(AdShareHelper::getLanguageCode());
        Views::Search($phrase,AdShareHelper::getUserFromCookie());
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
        require_once '../app/view/not-found.php';
        header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    }
}
catch (Exception $exception)
{
    header($_SERVER["SERVER_PROTOCOL"] . "500 Internal Server Error");
}