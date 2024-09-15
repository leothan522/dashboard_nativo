<?php

namespace app\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return $this->view('index', [
            'title' => '1989-02-21',
            'texto' => public_path()
        ]);
    }

    public function prueba()
    {
        $data = crearResponse(getFecha(), root_path(), true);
        return $this->json($data);
    }
}