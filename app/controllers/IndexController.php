<?php

namespace Aijkl\AdShare;
use Exception;
use Ginq;

class IndexController
{
    public function index()
    {
        $phrase = PhraseStore::getInstance()->getPhrase(AdShareHelper::getLanguageCode());
        try
        {
            $dataBase = AdShareHelper::createDataBase();
            $adviceEntities = $dataBase->getAdvices(ConstParameters::ADVICE_VIEW_LIMIT);

            $userProfiles = AdShareHelper::getUserProfiles($dataBase,$adviceEntities);

            Views::home($phrase,$adviceEntities,$userProfiles,AdShareHelper::getUserFromCookie());
        }
        catch (UserNotAuthException|UserNotFoundException)
        {
            Views::landingPage();
        }
        catch (AdviceNotFoundException)
        {
            Views::notFound($phrase);
        }
        catch (Exception $exception)
        {
            // todo internal server error page
            echo $exception->getTraceAsString();
        }
    }
}