<?php

namespace Aijkl\AdShare;
class Views
{
    static function Search(Phrase $phrase,UserEntity $userEntity = null)
    {
        require __DIR__ . "/search.php";
    }
    static function Home(Phrase $phrase,UserEntity $userEntity = null)
    {
        require __DIR__ . "/home.php";
    }
    static function NotFound(Phrase $phrase)
    {
        require __DIR__ . "/not-found.php";
    }
    static function BadRequest(Phrase $phrase)
    {
        require __DIR__ . "/bad-request.php";
    }
}