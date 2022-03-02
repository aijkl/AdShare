<?php

namespace Aijkl\AdShare;
use Exception;
use Ginq;

class AdviceController
{
    public function show(string $id)
    {
        $userEntity = null;
        try
        {
            $userEntity = AdShareHelper::getUserFromCookie();
        }
        catch(Exception)
        {
            // ignore
        }

        $phrase = PhraseStore::getInstance()->getPhrase(AdShareHelper::getLanguageCode());
        try
        {
            // todo ユーザーが退会したら？？
            $database = AdShareHelper::createDataBase();
            $adviceEntity = $database->getAdvice($id);
            $userProfile = $database->getUserProfile($adviceEntity->authorId);
            Views::showAdvice($phrase,$userEntity,$adviceEntity,$userProfile);
        }
        catch (UserNotFoundException|AdviceNotFoundException $exception)
        {
            Views::notFound($phrase);
        }
    }
    public function create()
    {
        $userEntity = null;
        try
        {
            $userEntity = AdShareHelper::getUserFromCookie();
        }
        catch (UserNotAuthException|TokenNotFoundException|UserNotFoundException)
        {
            Views::landingPage();
        }

        $json = json_decode(file_get_contents("php://input"),true);
        $body = AdShareHelper::getStringOrEmpty($json,ConstParameters::BODY);
        $target = AdShareHelper::getStringOrEmpty($json,ConstParameters::TARGET);
        $tags = AdShareHelper::getArrayOrNull($json,ConstParameters::TAG_ARRAY);

        $phrase = PhraseStore::getInstance()->getPhrase(AdShareHelper::getLanguageCode());
        $response = new Response();
        if(AdShareHelper::checkFormatTarget($phrase,$target,$response) == false || AdShareHelper::checkFormatBody($phrase,$body,$response) == false || AdShareHelper::checkFormatTag($phrase,$tags,$response) == false)
        {
            echo json_encode($response);
            return;
        }

        try
        {
            $database = AdShareHelper::createDataBase();
            $adviceEntity = $database->createAdvice($body,$target,$userEntity->id,$tags);
            echo json_encode(new Response(true,200,data: new RedirectUrl(ConstParameters::BASE_PATH_SHOW_ADVICE."/".$adviceEntity->id)));
        }
        catch (Exception $exception)
        {
            echo json_encode(new Response(false,400));
        }
    }
    public function createForm()
    {
        $userEntity = null;
        try
        {
            $userEntity = AdShareHelper::getUserFromCookie();
        }
        catch (UserNotAuthException|TokenNotFoundException|UserNotFoundException)
        {
            Views::landingPage();
        }

        $phrase = PhraseStore::getInstance()->getPhrase(AdShareHelper::getLanguageCode());
        Views::createAdviceForm($phrase,$userEntity);
    }
}