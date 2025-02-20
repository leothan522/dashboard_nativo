<?php

namespace app\Middlewares;

use JetBrains\PhpStorm\NoReturn;

class Middleware
{
    use Authenticate;
    use Guest;
    use VerifyEmail;
    use Admin;

    protected static function notAuthorized($closure): void
    {
        if (is_array($closure)){
            self::json(...$closure);
        }else{
            self::redirect($closure);
        }
    }

    protected static function redirect($uri): void
    {
        redirect($uri);
    }

    #[NoReturn] protected static function json($title = null, $message = null, $error = 'error'): void
    {
        if (is_null($title)){
            $title = 'Access denied.';
        }

        if (is_null($message)){
            $message = 'No se cumplen los Requerimientos para acceder al recurso solicitado.';
        }
        header('Content-Type: application/json; charset=utf-8');
        $response['ok'] = false;
        $response['toast'] = $error;
        $response['title'] = $title;
        $response['message'] = $message;
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        exit();
    }

}