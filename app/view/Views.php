<?php

namespace Aijkl\AdShare;
class Views
{
    static function search(Phrase $phrase, UserEntity $userEntity = null)
    {
        require __DIR__ . "/search.php";
    }
    static function home(Phrase $phrase, UserEntity $userEntity = null)
    {
        require __DIR__ . "/home.php";
    }
    static function advices()
    {
        require __DIR__ . "/";
    }
    static function notFound(Phrase $phrase)
    {
        require __DIR__ . "/not-found.php";
    }
    static function badRequest(Phrase $phrase)
    {
        require __DIR__ . "/bad-request.php";
    }
}