<?php

namespace Aijkl\AdShare;

class AuthController
{
    public function signIn()
    {
        Api::signIn();
    }

    public function signUp()
    {
        Api::signUp();
    }

    public function signInForm()
    {
        Views::signInForm();
    }

    public function signUpForm()
    {
        Views::signUpForm();
    }

    public function signOut()
    {
        setcookie(ConstParameters::TOKEN, null, -1, '/');
        header('Location:/index');
    }
}