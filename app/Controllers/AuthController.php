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

    public function forgotPassword()
    {
        return $this->view('auth.forgot-password');
    }

    public function resetPassword()
    {
        return $this->view('auth.reset-password');
    }

    public function verifyEmail()
    {
        return $this->view('auth.verify-email');
    }
}