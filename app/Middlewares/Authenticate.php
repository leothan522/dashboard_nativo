<?php

namespace app\Middlewares;

trait Authenticate
{
    public static function auth($closure = []): void
    {
        if (isset($_SESSION[APP_KEY])) {


            $_SESSION[APP_KEY] = 'true';



        }else{
            session_destroy();
            self::notAuthorized($closure);
        }
    }
}