<?php

namespace app\Controllers;

class Controller
{
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
            return "No se encuentra la vista {$route}";
        }
    }

    public function json($data = [])
    {
        if (empty($data)){
            $response['result'] = false;
            $response['icon'] = "error";
            $response['title'] = "Array DATA EMPTY";
            $response['message'] = "No se definió la variable Data o esta vacía.";
        }else{
            $response = $data;
        }
        header('Content-Type: application/json; charset=utf-8');
        return json_encode($response, JSON_UNESCAPED_UNICODE);
    }
}