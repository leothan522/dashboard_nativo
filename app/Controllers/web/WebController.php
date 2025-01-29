<?php

namespace app\Controllers\web;

use app\Controllers\Controller;

class WebController extends Controller
{
    public function index()
    {
        return $this->view('layouts.finanza.view_example');

    }
}