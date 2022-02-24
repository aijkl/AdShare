<?php

use Aijkl\AdShare\AdShareHelper;
use Aijkl\AdShare\ConstParameters;
use Aijkl\AdShare\PhraseStore;
use Aijkl\AdShare\Response;
use Aijkl\AdShare\SignUpRequest;
use Aijkl\AdShare\UserExistsException;
use Aijkl\AdShare\UserNotFoundException;

require '../../../app/vendor/autoload.php';

$json = json_decode(file_get_contents("php://input"),true);
$signUpRequest = new SignUpRequest();
$signUpRequest->mail = AdShareHelper::asStringOrEmpty($json,ConstParameters::MAIL);
$signUpRequest->password256 = AdShareHelper::asStringOrEmpty($json,ConstParameters::PASSWORD);
$signUpRequest->rememberMe = AdShareHelper::asStringOrEmpty($json,ConstParameters::REMEMBER_ME);
$signUpRequest->name = AdShareHelper::asStringOrEmpty($json,ConstParameters::NAME);
$phrase = PhraseStore::getInstance()->getPhrase(AdShareHelper::getLanguageCode());

$response = new Response();
$mailMismatch = AdShareHelper::checkFormatMail($phrase,$signUpRequest->mail,$response) == false;
$passwordMismatch = AdShareHelper::checkFormatPassword($phrase,$signUpRequest->password256,$response) == false;
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
    setcookie(ConstParameters::TOKEN,$tokenEntity->token,$signUpRequest->rememberMe ? time() + ConstParameters::TOKEN_EXPIRES_SECOND : 0);
    echo json_encode(new Response(true,200,"",$tokenEntity));
}
catch (UserExistsException $exception)
{
    echo json_encode(new Response(false,400,$phrase->userExitsError));
}