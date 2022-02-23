<?php

namespace Aijkl\AdShare;

class SignInRequest
{
    public string $mail;
    public string $password256;
    public bool $rememberMe;
}