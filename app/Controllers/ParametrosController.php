<?php

namespace app\Controllers;

class ParametrosController extends Controller
{

    function index()
    {

        $data =[
            "title" => "Parametros",
        ];

        return $this->view('parametros.view', $data);
    }
}