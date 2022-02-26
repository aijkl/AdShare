<?php

namespace Aijkl\AdShare;

class SignInRequest
{
    public string $mail;
    public string $passwordSha256;
    public bool $rememberMe;
}