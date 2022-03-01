<?php

use Aijkl\AdShare\AdShareHelper;
use Aijkl\AdShare\PhraseStore;
use Aijkl\AdShare\Views;
use Aijkl\AdShare\IndexController;
use Aijkl\AdShare\AuthController;

require_once '../app/vendor/autoload.php';
$router = new AltoRouter();

try
{
    $router->map('POST','/api/auth/sign-in','Aijkl\AdShare\AuthController::signIn');
    $router->map('POST','/api/auth/sign-in','Aijkl\AdShare\AuthController::signUp');
    $router->map('GET','/auth/sign-in','Aijkl\AdShare\AuthController::signInForm');
    $router->map('GET','/auth/sign-up','Aijkl\AdShare\AuthController::signUpForm');
    $router->map('GET','/auth/sign-out','Aijkl\AdShare\AuthController::signOut');

    $router->map('GET','/test',"Aijkl\AdShare\TestController::test","test");

    $router->map('GET','@(index|home)','Aijkl\AdShare\IndexController::index',"index");
    $router->map( 'GET', '/image/[*:id]','Aijkl\AdShare\ImageController::showImage');
    $router->map('GET','/search', 'Aijkl\AdShare\SearchController::search', 'search');

    $match = $router->match();

    if ($match !== false)
    {
        if (is_callable($match['target']))
        {
            call_user_func_array( $match['target'], $match['params'] );
        }
        else
        {
            $params = explode("::", $match['target']);
            $action = new $params[0]();
            call_user_func_array(array($action, $params[1]), $match['params']);
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