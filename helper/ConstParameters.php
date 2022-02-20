<?php

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

    public const MailRegex = "/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/"; // todo 検証
    public const LangCodeKey = "lang";
    public const DefaultLangCode = "ja";
}