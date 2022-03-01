<?php

namespace Aijkl\AdShare;
class Api
{
    static function signIn()
    {
        require_once __DIR__ . "/auth/sign-in.php";
    }

    static function signUp()
    {
        require_once __DIR__ . "/auth/sign-up.php";
    }
}