<?php

use Dotenv\Dotenv;

init();

function init(): void
{
    try {
        $dotenv = Dotenv::createImmutable(dirname(__FILE__, 2));
        $dotenv->load();
    } catch (Exception $exception) {
        echo $exception->getMessage();
        exit();
    }

    define('ROOT_PATH', dirname(__FILE__, 2));

    //Definimois valores por defecto para las variebles de entorno
    define('APP_NAME', env('APP_NAME'));
    $key = 'id';
    if (env('APP_KEY')) {
        $key = str_replace(':', '', env('APP_KEY'));
        $key = str_replace('=', '', $key);
    }
    define('APP_KEY', $key);
    define('APP_DEBUG', env('APP_DEBUG', true));
    define('APP_URL', env('APP_URL', getURLActual()));
    define('APP_DOMINIO', env('APP_DOMINIO', getURLActual()));
    define('APP_TIMEZONE', env('APP_TIMEZONE', "America/Caracas"));
    define('APP_REGISTER', env('APP_REGISTER', false));

    //database
    define('DB_CONNECTION', env('DB_CONNECTION', "mysql"));
    define('DB_HOST', env('DB_HOST', "127.0.0.1"));
    define('DB_PORT', env('DB_PORT', 3306));
    define('DB_DATABASE', env('DB_DATABASE', "nombre_database"));
    define('DB_USERNAME', env('DB_USERNAME', "root"));
    define('DB_PASSWORD', env('DB_PASSWORD'));

    //mail
    define('MAIL_MAILER', env('MAIL_MAILER', "smtp"));
    define('MAIL_HOST', env('MAIL_HOST', "mailpit"));
    define('MAIL_PORT', env('MAIL_PORT', 1025));
    define('MAIL_USERNAME', env('MAIL_USERNAME'));
    define('MAIL_PASSWORD', env('MAIL_PASSWORD'));
    define('MAIL_ENCRYPTION', env('MAIL_ENCRYPTION'));
    define('MAIL_FROM_ADDRESS', env('MAIL_FROM_ADDRESS', "hello@example.com"));
    define('MAIL_FROM_NAME', env('MAIL_FROM_NAME', APP_NAME));

    testConnection();

}

function env($env, $default = null): mixed
{
    if (isset($_ENV[mb_strtoupper($env)])) {
        if ($_ENV[mb_strtoupper($env)] == "false") {
            $_ENV[mb_strtoupper($env)] = false;
        }
        $response = trim($_ENV[mb_strtoupper($env)], '/');
    } else {
        $response = $default;
    }
    return $response;
}

function root_path($path = null): string
{
    if (empty($path)) {
        return ROOT_PATH;
    } else {
        $path = str_replace('/', '\\', $path);
        return ROOT_PATH . "\\" . $path;
    }
}

function public_path($path = null): string
{
    if (empty($path)) {
        return ROOT_PATH . '\\public';
    } else {
        $path = str_replace('/', '\\', $path);
        return ROOT_PATH . "\\public\\" . $path;
    }
}

function storage_path($path = null): string
{
    if (empty($path)) {
        return ROOT_PATH . '\\storage\\public';
    } else {
        $path = str_replace('/', '\\', $path);
        return ROOT_PATH . "\\storage\\public\\" . $path;
    }
}

function asset($uri = null, $noCache = false): void
{
    $uri = trim($uri, '/');
    $version = null;
    if ($noCache) {
        if (env('APP_DEBUG')) {
            $version = "?v=" . rand();
        }
    }
    $url = trim(APP_URL, '/');
    echo $url . '/' . $uri . $version;
}

function getAssetDominio($uri = null, $noCache = false): void
{
    $url = trim(dirname(APP_URL), '/');
    $version = null;
    if ($noCache) {
        if (env('APP_DEBUG')) {
            $version = "?v=" . rand();
        }
    }
    echo $url . '/' . $uri . $version;
}

function getURLActual(): string
{
    // Obtener el protocolo (http o https)
    $protocolo = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    // Obtener el nombre del host
    $host = $_SERVER['HTTP_HOST'];
    // Obtener la URI de la solicitud
    $uri = $_SERVER['REQUEST_URI'];
    // Combinar todo para obtener la URL completa
    return $protocolo . $host . $uri;
}

function redirect($uri): void
{
    $url = APP_URL . '/';
    $uri = trim($uri, '/');
    header("location: {$url}{$uri}");
    return;
}

function route($uri): string
{
    $url = APP_URL . '/';
    $uri = trim($uri, '/');
    return $url . $uri;
}

function require_view($route): void
{
    $route = str_replace('.', '/', $route);
    $path = root_path("resources/views/{$route}.php");
    if (file_exists($path)) {
        include $path;
    }else{
        echo "No se encuentra la vista [<code> {$route}.php </code>]";
    }
}

function testConnection(): void
{
    $model = new \app\Models\Model();
}

