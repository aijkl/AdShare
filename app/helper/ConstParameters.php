<?php
namespace Aijkl\AdShare;
class ConstParameters
{
    // key
    public const ID = "id";
    public const NAME = "name";
    public const PASSWORD = "password";
    public const REMEMBER_ME = "rememberMe";
    public const MAIL = "mail";
    public const TOKEN = "token";
    public const LANG_CODE_COOKIE_KEY = "lang";
    public const TARGET = "target";
    public const BODY = "body";
    public const TAG_ARRAY = "tags";

    // auth
    public const PASSWORD_MAX = 120;
    public const PASSWORD_MIN = 6;
    public const NAME_MAX = 10;
    public const NAME_MIN = 4;
    public const MAIL_MAX = 30;
    public const MAIL_MIN = 3;
    public const TOKEN_EXPIRES_YEAR = 9000;
    public const MAIL_REGEX = "/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/";

    // path
    public const BASE_PATH_SHOW_ADVICE = "/show/advice";

    // search advice
    public const SEARCH_TARGET_MAX = 20;
    public const SEARCH_BODY_MAX = 20;
    public const SEARCH_TAG_MAX = 20;

    // home
    public const ADVICE_VIEW_LIMIT = 20;

    // create advice
    public const TARGET_MAX = 20;
    public const TARGET_MIN = 2;
    public const BODY_MAX = 300;
    public const BODY_MIN = 10;
    public const TAG_ELEMENT_MAX = 20;
    public const TAG_ELEMENT_MIN = 2;
    public const TAG_COUNT_MAX = 10;
    public const TAG_COUNT_MIN = 0;

    public const HOME_URL = "/home";
    public const DEFAULT_LANG_CODE = "ja";
}