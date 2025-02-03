<?php

namespace app\Controllers\web;

use app\Controllers\Controller;
use app\Middlewares\Middleware;

class GuestController extends Controller
{

    public function __construct()
    {
        Middleware::guest('/');
    }

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

    /*momentaneo para probar vista de email*/
    public function verify()
    {

        $url = route('verify/email/leonardo');
        $data = [
            'url' => $url
        ];
        return $this->view('emails.verify', $data
        );
    }

}