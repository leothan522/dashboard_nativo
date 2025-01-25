<?php

namespace app\Controllers;

use app\Middlewares\Middleware;
use app\Models\Parametro;
use app\Providers\Auth;
use lib\Facades\GUMP;

class ParametrosController extends Controller
{
    public $totalRows = 5;

    function index()
    {
        Middleware::auth();
        return $this->json(Auth::user());
    }

    function index_old()
    {
        $model = new Parametro();
        $total = $model->where('id', '!=', 0)->count();
        $parametros = $model->limit($this->totalRows)->all();

        $data =[
            "title" => "Parametros",
            "parametros" => $parametros,
            "total" => $total,
            "totalRows" => $this->totalRows
        ];

        return $this->view('parametros.view', $data);
    }
    function store()
    {
        try {


            $model = new Parametro();
            $row = [];

            $gump = new GUMP();

            $gump->validation_rules([
                "nombre" => "required|alpha_numeric_dash",
                "tabla_id" => "required|integer",
                "valor" => "required"
            ]);

            $gump->set_fields_error_messages([
                "nombre" => ["alpha_numeric_dash" => "hola"]
            ]);

            $gump->filter_rules([
                "nombre" => "trim|sanitize_string|lower_case",
                "valor" => "trim|sanitize_string"
            ]);

            $valid_data = $gump->run($_POST);

            if ($gump->errors()){
                $row = crearResponse();
                $row['errors'] = $gump->get_errors_array();
            }else{
                $data = array_values($valid_data);
                $data[] = getRowquid($model);
                $row = $model->save($data);
                $row->ok = true;
            }



            return $this->json($row);

        }catch (\Error|\Exception $e){
            $this->showError('Error en el Controller', $e);
        }


    }

    function setLimit()
    {
        $model = new Parametro();
        $total = $model->where('id', '!=', 0)->count();
        $parametros = $model->limit($this->totalRows)->all();

        $data =[
            "title" => "Parametros",
            "parametros" => $parametros,
            "total" => $total,
            "totalRows" => $this->totalRows
        ];
        return $this->view('parametros.components.table', $data);
    }

}