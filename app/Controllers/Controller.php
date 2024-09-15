<?php

namespace app\Controllers;

use JetBrains\PhpStorm\NoReturn;

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

    #[NoReturn] protected function showError($title, $e, $isText = false): void
    {
        if ($isText){
            $message = $e;
        }else{
            $message = $e->getMessage();
        }
        header('Content-Type: application/json; charset=utf-8');
        $response['result'] = false;
        $response['icon'] = "error";
        $response['title'] = $title;
        $response['message'] = $message;
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        exit();
    }
}