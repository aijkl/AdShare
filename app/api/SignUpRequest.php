<?php

namespace Aijkl\AdShare;

class SignUpRequest
{
    public string $mail;
    public string $password256;
    public string $name;
    public bool $rememberMe;
}