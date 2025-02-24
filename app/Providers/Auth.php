<?php

namespace app\Providers;

use app\Models\Session;
use app\Models\User;

class Auth
{
    public static function user(): mixed
    {
        $model = new Session();
        $sesion = $model->where('rowquid', $_SESSION[APP_KEY] ?? 'null')->first();
        if ($sesion) {
            $model = new User();
            return $model->find($sesion->users_id);
        }else{
            return null;
        }
    }

    public static function loginUsingId($id): void
    {
        $model = new User();
        $user = $model->find($id);
        if ($user) {
            $sesion = new Session();
            $data = [
                $user->id,
                getClientIP(),
                Matomo::getDeviceDetector()->getUserAgent(),
                json_encode(Matomo::getDeviceDetector()->getClient(), JSON_UNESCAPED_UNICODE),
                json_encode(Matomo::getDeviceDetector()->getOs(), JSON_UNESCAPED_UNICODE),
                getRowquid($sesion),
            ];
            $auth = $sesion->save($data);
            $_SESSION[APP_KEY] = $auth->rowquid;
        }
    }

    public static function logout(): void
    {
        $model = new Session();
        $sesion = $model->where('rowquid', $_SESSION[APP_KEY] ?? 'null')->first();
        if ($sesion) {
            $model->update($sesion->id, []);
        }
        session_destroy();
    }

    public static function validatePermissions($permission = null): bool
    {
        $response = false;
        $user = Auth::user();
        if ($user) {
            $permissions = Auth::user()->permissions;
            $is_admin = Auth::user()->role == 1 || Auth::user()->role == -1;
            if (empty($permission)) {
                $uri = getURIRoute();
            }else{
                $uri = trim($permission, '/');
            }
            if (leerJson($permissions, $uri) || $is_admin){
                $response = true;
            }
        }
        return $response;
    }

}