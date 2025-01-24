<?php

namespace app\Middlewares;

use app\Models\Session;

trait Authenticate
{
    public static function auth($closure = []): void
    {
        if (isset($_SESSION[APP_KEY])) {
            $model = new Session();
            $sesion = $model->where('rowquid', $_SESSION[APP_KEY])->first();
            if (!$sesion) {
                session_destroy();
                self::notAuthorized($closure);
            }
        }else{
            session_destroy();
            self::notAuthorized($closure);
        }
    }
}