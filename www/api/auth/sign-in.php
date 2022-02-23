<?php

use Aijkl\AdShare\AdShareHelper;
use Aijkl\AdShare\ConstParameters;
use Aijkl\AdShare\PhraseStore;
use Aijkl\AdShare\Response;
use Aijkl\AdShare\SignInRequest;
use Aijkl\AdShare\UserNotFoundException;

require '../../../app/vendor/autoload.php';

$json = json_decode(file_get_contents("php://input"),true);
$signInRequest = new SignInRequest();
$signInRequest->mail = AdShareHelper::asStringOrEmpty($json,ConstParameters::MaiMAIL);
$signInRequest->password256 = AdShareHelper::asStringOrEmpty($json,ConstParameters::PASSWORD);
$signInRequest->rememberMe = AdShareHelper::asStringOrEmpty($json,ConstParameters::REMEMBER_ME);
$phrase = PhraseStore::getInstance()->getPhrase(AdShareHelper::getLanguageCode());

$response = new Response();
if(AdShareHelper::checkFormatMail($phrase,$signInRequest->mail,$response) == false || AdShareHelper::checkFormatPassword($phrase,$signInRequest->password256,$response) == false)
{
    echo json_encode($response);
    exit;
}

$database = AdShareHelper::createDataBase();
try
{
    $tokenEntity = $database->signIn($signInRequest);
    setcookie(ConstParameters::TOKEN,$tokenEntity->token,$signInRequest->rememberMe ? time() + ConstParameters::TOKEN_EXPIRES_SECOND : 0);
    echo json_encode(new Response(true,200,"",$tokenEntity));
}
catch (UserNotFoundException $exception)
{
    echo json_encode(new Response(false,404,$phrase->authBadParameter));
}