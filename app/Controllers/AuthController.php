<?php

namespace app\Controllers;
class AuthController extends Controller
{
    public function login()
    {
        return $this->view('auth.login');

    }

}