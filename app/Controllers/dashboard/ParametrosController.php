<?php

namespace app\Controllers\dashboard;

use app\Controllers\Controller;
use app\Middlewares\Middleware;
use app\Models\Parametro;
use app\Providers\Mail;
use app\Providers\Rule;
use lib\Facades\GUMP;
use PHPMailer\PHPMailer\Exception;

class ParametrosController extends Controller
{
    public $totalRows = 5;

    function index()
    {
        try {

            Middleware::admin('web');

            $model = new Parametro();
            $total = $model->where('id', '!=', 0)->count();
            $parametros = $model->limit($this->totalRows)->all();

            $data =[
                "title" => "Parametros",
                "parametros" => $parametros,
                "total" => $total,
                "totalRows" => $this->totalRows
            ];

            return $this->view('dashboard.parametros.view', $data);

        }catch (\Error|\Exception $e){
            $this->showError('Error en el Controller', $e);
        }
    }

    function store()
    {
        try {

            $rules = [
                //"nombre" => "required|alpha_numeric_dash",
                "nombre" => ['required', 'alpha_numeric_dash', 'unique' => Rule::unique('parametros', 'nombre')],
                "tabla_id" => "required|integer",
                "valor" => "required"
            ];

            $messages = [
                "nombre" => ["alpha_numeric_dash" => "alpha_numeric_dash"]
            ];

            $filter = [
                "nombre" => "trim|sanitize_string|lower_case",
                "valor" => "trim|sanitize_string"
            ];

            $this->validate($rules, $messages, $filter);

            $model = new Parametro();
            $data = array_values($this->VALID_DATA);
            $data[] = getRowquid($model);
            $row = $model->save($data);
            $row->ok = true;

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
        return $this->view('dashboard.parametros.components.table', $data);
    }

}