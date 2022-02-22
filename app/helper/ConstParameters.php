<?php
namespace Aijkl\AdShare;
class ConstParameters
{
    public const Id = "id";
    public const Name = "name";
    public const Password = "password";
    public const Mail = "mail";

    public const PasswordMax = 120;
    public const PasswordMin = 6;
    public const NameMax = 10;
    public const NameMin = 4;
    public const MailMax = 30;
    public const MailMin = 3;

    public const MailRegex = "/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/"; // todo 検証
    public const LangCodeCookieKey = "lang";
    public const DefaultLangCode = "ja";
}