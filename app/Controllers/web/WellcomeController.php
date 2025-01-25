<?php

namespace app\Controllers\web;

use app\Controllers\Controller;

class WellcomeController extends Controller
{
    public function index()
    {
        try {
            return $this->view('wellcome');
        }catch (\Error $e){
            $this->showError('Error en el Controller', $e);
        }
    }

}