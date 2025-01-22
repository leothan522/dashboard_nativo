<?php

namespace app\Providers;

use app\Models\User;

class Auth
{
    public static function user()
    {
        $model = new User();
        return $model->find(1);
    }
}