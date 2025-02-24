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
        }else{
            $permissions = Auth::user()->permissions;
            $is_admin = Auth::user()->role == 1 || Auth::user()->role == -1;
            if (!leerJson($permissions, getURIRoute()) && !$is_admin){
                self::notAuthorized('admin');
            }
        }
    }
}