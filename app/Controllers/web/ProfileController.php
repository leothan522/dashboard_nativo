<?php

namespace app\Controllers\web;

use app\Controllers\Controller;
use app\Middlewares\Middleware;

class ProfileController extends Controller
{

    public function __construct()
    {
        Middleware::auth('login');
    }

    public function index()
    {
        return $this->view('web.profile.view');
    }

}