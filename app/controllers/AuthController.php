<?php

namespace Aijkl\AdShare;

use Exception;

class AuthController
{
    public function signIn()
    {
        try
        {
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
        }
        catch (Exception)
        {
            echo json_encode(new Response(false,500));
        }
    }

    public function signUp()
    {
        try
        {
            $json = json_decode(file_get_contents("php://input"),true);
            $signUpRequest = new SignUpRequest();
            $signUpRequest->mail = AdShareHelper::getStringOrEmpty($json,ConstParameters::MAIL);
            $signUpRequest->rememberMe = AdShareHelper::getStringOrEmpty($json,ConstParameters::REMEMBER_ME);
            $signUpRequest->name = AdShareHelper::getStringOrEmpty($json,ConstParameters::NAME);
            $signUpRequest->passwordHash256 = AdShareHelper::getHashOrEmpty($json,ConstParameters::PASSWORD);
            $phrase = PhraseStore::getInstance()->getPhrase(AdShareHelper::getLanguageCode());

            $response = new Response();
            $passwordRaw = AdShareHelper::getStringOrEmpty($json,ConstParameters::PASSWORD);
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
        }
        catch (Exception)
        {
            echo json_encode(new Response(false,500));
        }
    }

    public function signInForm()
    {
        Views::signInForm();
    }

    public function signUpForm()
    {
        Views::signUpForm();
    }

    public function signOut()
    {
        setcookie(ConstParameters::TOKEN, null, -1, '/');
        header('Location:/index');
    }
}