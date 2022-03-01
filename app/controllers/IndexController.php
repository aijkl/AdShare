<?php

namespace Aijkl\AdShare;
use Exception;

class IndexController
{
    public function index()
    {
        try
        {
            $phrase = PhraseStore::getInstance()->getPhrase(AdShareHelper::getLanguageCode());
            Views::home($phrase,AdShareHelper::getUserFromCookie());
        }
        catch (Exception)
        {
            Views::landingPage();
        }
    }
}