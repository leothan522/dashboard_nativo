<?php

namespace app\Controllers;

use app\Middleware\Middleware;
use app\Models\Parametro;

class HomeController extends Controller
{
    public function index()
    {
        try {
            return $this->view('index', [
                'title' => 'Prueba Guardar Parametros'
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
            $rows = $model->where('id',  '>', 0)->get();
            //echo "eliminado";
            return $this->json($rows);
            //return $rows;



        }catch (\Error $e){
            $this->showError('Error en el Controller', $e);
        }
    }

    public function vericifando()
    {
        try {

            /*foreach ($_POST as $key => $value) {
                ${$key} = trim(addslashes(strip_tags($value)));
            }*/

            $model = new Parametro();
            $data = [
                $_POST['nombre'],
                $_POST['tabla_id'],
                $_POST['valor'],
                getRowquid($model)
            ];

           $row = $model->save($data);
            return $this->json($row);

        }catch (\Error $e){
            $this->showError('Error en el Controller', $e);
        }
    }
}