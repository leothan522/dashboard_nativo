<?php

namespace app\Controllers\test;

use app\Controllers\Controller;
use app\Models\Parametro;
use lib\Facades\GUMP;

class TestController extends Controller
{

    public function index()
    {
        try {
            return $this->view('test.view_test');
        }catch (\Error $e){
            $this->showError('Error en el Controller', $e);
        }
    }

    public function testGUMP()
    {
        try {

            $model = new Parametro();

            // establecer reglas de validación
            $rules = [
                'nombre' => 'required|min_len, 3|max_len,50',
                'tabla_id' => 'required|integer',
                'valor' => 'required'
            ];

            // establecer mensajes de error específicos de las reglas de campo
            $messages = [
                //
            ];

            // establecer reglas de filtro
            $filter = [
                'nombre' => 'trim|rmpunctuation|sanitize_string',
                'valor'    => 'trim',
            ];

            //ejecutamos las validaciones con GUMP nos devolvera:
            // $this->VALID_DATA
            $this->validate($rules, $messages, $filter);

            //si pasa correctamente las validaciones procesamos la peticion
            $data = array_values($this->VALID_DATA);
            $data[] = getRowquid($model);
            $row = $model->save($data);
            $row->ok = true;

            return $this->json($row);

        }catch (\Error|\Exception $e){
            $this->showError('Error en el Controller', $e);
        }
    }

}