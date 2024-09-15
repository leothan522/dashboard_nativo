<?php

namespace app\Controllers;

use app\Models\Parametro;

class HomeController extends Controller
{
    public function index()
    {
        try {
            return $this->view('index', [
                'title' => '1989-02-21',
                'texto' => public_path()
            ]);
        }catch (\Error $e){
            $this->showError('Error en el Controller', $e);
        }
    }

    public function prueba()
    {
        try {
            $data = crearResponse(getFecha(), root_path(), true);
            return $this->json($data);
        }catch (\Error $e){
            $this->showError('Error en el Controller', $e);
        }
    }

    public function database()
    {
        try {


            $model = new Parametro();
            $i = 0;

            $model->delete(6);
            $rows = $model->all();
            //echo "eliminado";
            return $this->json($rows);
            //return $rows;



        }catch (\Error $e){
            $this->showError('Error en el Controller', $e);
        }
    }
}