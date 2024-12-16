<?php

namespace app\Controllers;

class LoginController extends Controller
{
    public function index()
    {
        return $this->view('propuestas.view');
    }

}