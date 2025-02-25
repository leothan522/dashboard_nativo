<?php

namespace app\Controllers\web;

use app\Controllers\Controller;
use app\Providers\Auth;

class WellcomeController extends Controller
{
    public function index()
    {
        try {
            if (Auth::user()){
                if (Auth::user()->role){
                    //user admin al dashboard
                    redirect('admin');
                }else{
                    //user public a web
                    redirect('web');
                }
            }
            return $this->view('wellcome');
        }catch (\Error $e){
            $this->showError('Error en el Controller', $e);
        }
    }

    public function master()
    {
        try {
            return $this->view('layouts.web.master');
        }catch (\Error $e){
            $this->showError('Error en el Controller', $e);
        }
    }

}