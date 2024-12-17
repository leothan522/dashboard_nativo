<?php

namespace app\Controllers;
class AuthController extends Controller
{
    public function login()
    {
        return $this->view('auth.login');

    }

    public function register(){
        return $this->view('auth.register');
    }

}