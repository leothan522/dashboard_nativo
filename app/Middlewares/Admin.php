<?php

namespace app\Middlewares;

use app\Providers\Auth;

trait Admin
{
    public static function admin($closure = []): void
    {
        Middleware::auth($closure);
        if (Auth::user()->role == 0) {
            self::notAuthorized($closure);
        }
    }
}