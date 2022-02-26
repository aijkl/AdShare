<?php

use Aijkl\AdShare\AdShareHelper;
use Aijkl\AdShare\ConstParameters;
use Aijkl\AdShare\PhraseStore;
use Aijkl\AdShare\RedirectUrl;
use Aijkl\AdShare\Response;
use Aijkl\AdShare\SignUpRequest;
use Aijkl\AdShare\UserExistsException;

$json = json_decode(file_get_contents("php://input"),true);
$signUpRequest = new SignUpRequest();
$signUpRequest->mail = AdShareHelper::asStringOrEmpty($json,ConstParameters::MAIL);
$signUpRequest->rememberMe = AdShareHelper::asStringOrEmpty($json,ConstParameters::REMEMBER_ME);
$signUpRequest->name = AdShareHelper::asStringOrEmpty($json,ConstParameters::NAME);
$signUpRequest->passwordHash256 = AdShareHelper::asHashOrEmpty($json,ConstParameters::PASSWORD);
$phrase = PhraseStore::getInstance()->getPhrase(AdShareHelper::getLanguageCode());

$response = new Response();
$passwordRaw = AdShareHelper::asStringOrEmpty($json,ConstParameters::PASSWORD);
$mailMismatch = AdShareHelper::checkFormatMail($phrase,$signUpRequest->mail,$response) == false;
$passwordMismatch = AdShareHelper::checkFormatPassword($phrase,$passwordRaw,$response) == false;
$nameMismatch = AdShareHelper::checkFormatName($phrase,$signUpRequest->name,$response) == false;
if($mailMismatch || $passwordMismatch || $nameMismatch)
{
    echo json_encode($response);
    exit;
}

$database = AdShareHelper::createDataBase();
try
{
    $tokenEntity = $database->signUp($signUpRequest);
    if($signUpRequest->rememberMe)
    {
        setcookie(ConstParameters::TOKEN,$tokenEntity->token,path: "/",expires_or_options: time() + ConstParameters::TOKEN_EXPIRES_YEAR,secure: true);
    }
    else
    {
        setcookie(ConstParameters::TOKEN,$tokenEntity->token,path: "/",secure: true);
    }
    echo json_encode(new Response(true,200,"",new RedirectUrl(ConstParameters::HOME_URL)));
}
catch (UserExistsException $exception)
{
    echo json_encode(new Response(false,400,$phrase->userExitsError));
}