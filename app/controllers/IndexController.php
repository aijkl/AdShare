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

            $userProfiles = Ginq::from($adviceEntities)->select(function (AdviceEntity $x)
            {
                return $x->authorId;
            })->distinct()->select(function ($x) use ($dataBase)
            {
                return $dataBase->getUserProfile($x);
            })->toArray();

            Views::home($phrase,$adviceEntities,$userProfiles,AdShareHelper::getUserFromCookie());
        }
        catch (AdviceNotFoundException)
        {
            Views::notFound($phrase);
        }
        catch (Exception $exception)
        {
            echo $exception->getMessage();
        }
    }
}