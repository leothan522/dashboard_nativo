<?php

namespace app\Controllers;

use Exception;
use JetBrains\PhpStorm\NoReturn;
use lib\Facades\GUMP;

class Controller
{
    public mixed $VALID_DATA;

    public function view($route, $data = [])
    {
        //Destructurar el array
        extract($data);
        $route = str_replace('.', '/', $route);
        $path = root_path("resources/views/{$route}.php");
        if (file_exists($path)) {
            ob_start();
            include $path;
            $content = ob_get_clean();
            return $content;
        }else{
            $this->showError('View not found', "No se encuentra la vista <{$route}.php>", true);
        }
    }

    public function json($data = [])
    {
        if (empty($data)){
            $this->showError('Array DATA EMPTY', "No se definió la variable Data o esta vacía.", true);
        }else{
            $response = $data;
        }
        header('Content-Type: application/json; charset=utf-8');
        return json_encode($response, JSON_UNESCAPED_UNICODE);
    }

    /**
     * @throws Exception
     */
    public function validate(array $rules = [], array $messages = [], array $filter = []): void
    {
        $gump = new GUMP();

        /* *********************************************************************************
         * Agregamos un validador personalizado para unique en Database
         * Ejemplo en el controller:

            $rules = [
                "nombre" => ['required', 'alpha_numeric_dash', 'unique' => Rule::unique('parametros', 'nombre')],
            ];

        */

        $gump::add_validator("unique", function($field, array $input, array $params, $value) {
            if (isset($params[0]) && $params[0]){
                return false;
            }
            return true;
        }, 'El campo {field} ya se encuentra registrado.');

        //************************************************************************************

        // establecer reglas de validación
        $gump->validation_rules($rules);
        // establecer mensajes de error específicos de las reglas de campo
        $gump->set_fields_error_messages($messages);
        // establecer reglas de filtro
        $gump->filter_rules($filter);
        // en caso de éxito: devuelve una matriz con la misma estructura de entrada,
        // pero después de que se hayan ejecutado los filtros
        // en caso de error: devuelve falso
        $this->VALID_DATA = $gump->run($_POST);
        //chequeamos si no cumple las validaciones
        if ($gump->errors()){
            //mando mesajes de error
            $row = crearResponse();
            $row['errors'] = $gump->get_errors_array();
            echo $this->json($row);
            exit();
        }
    }

    #[NoReturn] protected function showError($title, $e, $isText = false): void
    {
        if ($isText){
            $message = $e;
        }else{
            $message = $e->getMessage();
        }
        header('Content-Type: application/json; charset=utf-8');
        $response['ok'] = false;
        $response['toast'] = "error";
        $response['title'] = $title;
        $response['message'] = $message;
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        exit();
    }
}