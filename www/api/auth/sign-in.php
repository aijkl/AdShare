<?php

use Aijkl\AdShare\AdShareHelper;
use Aijkl\AdShare\ConstParameters;
use Aijkl\AdShare\PhraseStore;
use Aijkl\AdShare\Response;
use Aijkl\AdShare\SignInRequest;
require '../../../vendor/autoload.php';

$signInRequest = new SignInRequest();
$signInRequest->Mail = AdShareHelper::AsStringOrEmpty($_POST,ConstParameters::Mail);
$signInRequest->Password256 = AdShareHelper::AsStringOrEmpty($_POST,ConstParameters::Password);
$phrase = PhraseStore::GetInstance()->GetPhrase(AdShareHelper::GetLanguageCode());

$response = new Response();
if(AdShareHelper::CheckFormatMail($phrase,$signInRequest->Mail,$response) == false || AdShareHelper::CheckFormatPassword($phrase,$signInRequest->Password256,$response) == false)
{
    echo json_encode($response);
    exit;
}

$businessLogic = AdShareHelper::CreateDataBase();

try
{
    $businessLogic->SignIn($signInRequest);
}
catch (UserNotFoundException $exception)
{
    echo json_encode(new Response(false,404,$phrase->AuthBadParameter));
}