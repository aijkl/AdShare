<?php

namespace Aijkl\AdShare;
use Ginq;

class SearchController
{
    /**
     * @throws UserNotFoundException
     * @throws TokenNotFoundException
     */
    public function search()
    {
        $userEntity = null;
        try
        {
            $userEntity = AdShareHelper::getUserFromCookie();
        }
        catch (UserNotAuthException)
        {
            //ignore exception
        }

        if(count($_GET) > 0)
        {
            $target = AdShareHelper::getStringOrEmpty($_GET,ConstParameters::TARGET);
            $body = AdShareHelper::getStringOrEmpty($_GET,ConstParameters::BODY);
            $tags = AdShareHelper::getArrayOrNull($_GET,ConstParameters::TAG_ARRAY);

            if(AdShareHelper::isNullOrEmpty($target) && AdShareHelper::isNullOrEmpty($body) && $tags == null)
            {
                $phrase = PhraseStore::getInstance()->getPhrase(AdShareHelper::getLanguageCode());
                Views::badRequest($phrase);
                return;
            }

            $dataBase = AdShareHelper::createDataBase();
            $phrase = PhraseStore::getInstance()->getPhrase(AdShareHelper::getLanguageCode());
            $adviceEntities = $dataBase->searchAdvice(target: $target,body: $body,tags: $tags);
            if($adviceEntities === false)
            {
                Views::notFound($phrase);
            }

            $userProfiles = AdShareHelper::getUserProfiles($dataBase,$adviceEntities);

            Views::searchResult($phrase,$userEntity,$adviceEntities,$userProfiles);
            return;
        }


        $phrase = PhraseStore::getInstance()->getPhrase(AdShareHelper::getLanguageCode());
        Views::searchForm($phrase,$userEntity);
    }
}