<?php

namespace app\Controllers;

use app\Middleware\Middleware;
use app\Models\Parametro;
use lib\Facades\GUMP;

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


            $model = new Parametro();

            $gump = new GUMP();

            // establecer reglas de validación
            $gump->validation_rules([
                'nombre' => 'required|min_len, 3|max_len,50',
                'tabla_id' => 'required|integer',
                'valor' => 'required'
            ]);

            // establecer reglas de filtro
            $gump->filter_rules([
                'nombre' => 'trim|rmpunctuation|sanitize_string',
                'tabla_id' => 'trim|whole_number',
                'valor'    => 'trim',
            ]);

            // en caso de éxito: devuelve una matriz con la misma estructura de entrada,
            // pero después de que se hayan ejecutado los filtros
            // en caso de error: devuelve falso
            $valid_data = $gump->run($_POST);

            if ($gump->errors()){
                $row = $gump->get_errors_array();
            }else{
                $data = array_values($valid_data);
                $data[] = getRowquid($model);
                $row = $model->save($data);
            }

            return $this->json($row);

        }catch (\Error|\Exception $e){
            $this->showError('Error en el Controller', $e);
        }
    }
}