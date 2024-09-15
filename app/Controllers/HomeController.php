<?php

namespace app\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return $this->view('index', [
            'title' => 'Prueba',
            'texto' => 'Hola Mundo!'
        ]);
    }

    public function prueba()
    {
        return $this->json([
            'title' => 'Prueba',
            'texto' => 'Hola Mundo!'
        ]);
    }
}