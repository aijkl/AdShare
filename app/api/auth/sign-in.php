<?php

use Aijkl\AdShare\AdShareHelper;
use Aijkl\AdShare\ConstParameters;
use Aijkl\AdShare\PhraseStore;
use Aijkl\AdShare\RedirectUrl;
use Aijkl\AdShare\Response;
use Aijkl\AdShare\SignInRequest;
use Aijkl\AdShare\UserNotFoundException;

$json = json_decode(file_get_contents("php://input"),true);
$signInRequest = new SignInRequest();
$signInRequest->mail = AdShareHelper::getStringOrEmpty($json,ConstParameters::MAIL);
$signInRequest->passwordSha256 = AdShareHelper::getHashOrEmpty($json,ConstParameters::PASSWORD);
$signInRequest->rememberMe = AdShareHelper::getStringOrEmpty($json,ConstParameters::REMEMBER_ME);
$phrase = PhraseStore::getInstance()->getPhrase(AdShareHelper::getLanguageCode());

$response = new Response();
if(AdShareHelper::checkFormatMail($phrase,$signInRequest->mail,$response) == false || AdShareHelper::checkFormatPassword($phrase,$signInRequest->passwordSha256,$response) == false)
{
    echo json_encode($response);
    exit;
}

$database = AdShareHelper::createDataBase();
try
{
    $tokenEntity = $database->signIn($signInRequest);
    if($signInRequest->rememberMe)
    {
        setcookie(ConstParameters::TOKEN,$tokenEntity->token,path: "/",expires_or_options: time() + ConstParameters::TOKEN_EXPIRES_YEAR,secure: true);
    }
    else
    {
        setcookie(ConstParameters::TOKEN,$tokenEntity->token,path: "/",secure: true);
    }
    echo json_encode(new Response(true,200,"",new RedirectUrl(ConstParameters::HOME_URL)));
}
catch (UserNotFoundException $exception)
{
    echo json_encode(new Response(false,404,$phrase->authBadParameter));
}