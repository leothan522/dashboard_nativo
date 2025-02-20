<?php

namespace app\Middlewares;

use app\Models\Session;

trait Guest
{
    public static function guest($closure = []): void
    {
        if (isset($_SESSION[APP_KEY])) {
            $model = new Session();
            $sesion = $model->where('rowquid', $_SESSION[APP_KEY])->first();
            if ($sesion) {
                self::notAuthorized($closure);
            }
        }
    }
}