<?php

namespace app\Controllers;

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