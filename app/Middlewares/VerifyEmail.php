<?php

namespace app\Middlewares;

use app\Providers\Auth;

trait VerifyEmail
{
    public static function verifyEmail($closure = []): void
    {
        if (!Auth::user()->email_verified_at){
            self::notAuthorized($closure);
        }
    }

}