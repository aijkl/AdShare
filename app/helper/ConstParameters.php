<?php
namespace Aijkl\AdShare;
class ConstParameters
{
    public const ID = "id";
    public const NAME = "name";
    public const PASSWORD = "password";
    public const REMEMBER_ME = "rememberMe";
    public const MAIL = "mail";
    public const TOKEN_EXPIRES_YEAR = 9000;
    public const TOKEN = "token";
    public const HOME_URL = "/home";

    public const PASSWORD_MAX = 120;
    public const PASSWORD_MIN = 6;
    public const NAME_MAX = 10;
    public const NAME_MIN = 4;
    public const MAIL_MAX = 30;
    public const MAIL_MIN = 3;

    public const MAIL_REGEX = "/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/"; // todo 検証
    public const LANG_CODE_COOKIE_KEY = "lang";
    public const DEFAULT_LANG_CODE = "ja";
}