<?php

namespace app\Middleware;

class Middleware
{
    public static function auth($closure): void
    {
        if (isset($_SESSION[APP_KEY])) {


            $_SESSION[APP_KEY] = 'true';



        }else{
            session_destroy();
            if (is_array($closure)){
                self::json(...$closure);
            }else{
                self::redirect($closure);
            }
        }
    }

    protected static function redirect($uri): void
    {
        redirect($uri);
    }

    protected static function json($title = null, $message = null, $error = 'error'): void
    {
        if (is_null($title)){
            $title = 'Access denied.';
        }

        if (is_null($message)){
            $message = 'No se cumplen los Requerimientos para acceder al recurso solicitado.';
        }
        header('Content-Type: application/json; charset=utf-8');
        $response['result'] = false;
        $response['icon'] = $error;
        $response['title'] = $title;
        $response['message'] = $message;
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        exit();
    }

}