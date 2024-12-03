<?php

namespace app\Controllers;

class BlankController extends Controller
{
    public function index()
    {
        try {
            return $this->view('layouts.adminlte._blank.view_blank');
        }catch (\Error $e){
            $this->showError('Error en el Controller', $e);
        }

    }
}