<?php

namespace app\Controllers\dashboard;

use app\Controllers\Controller;
use app\Middlewares\Middleware;
use app\Providers\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        Middleware::auth('/');
        if (Auth::user()->role == 0){
            redirect('/');
        }
    }

    public function index()
    {
        return $this->view('dashboard.home.view');
    }
}