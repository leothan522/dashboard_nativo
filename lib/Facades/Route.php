<?php

namespace lib\Facades;

class Route
{
    private static $routes = [];

    public static function get($uri, $callback): void
    {
        $uri = trim($uri, '/');
        $uri = self::getPathDominio().$uri;
        $uri = trim($uri, '/');
        self::$routes['GET'][$uri] = $callback;
    }

    public static function post($uri, $callback): void
    {
        $uri = trim($uri, '/');
        $uri = self::getPathDominio().$uri;
        $uri = trim($uri, '/');
        self::$routes['POST'][$uri] = $callback;
    }

    public static function dispatch(): void
    {
        $uri = $_SERVER['REQUEST_URI'];
        $uri = trim($uri, '/');

        $method = $_SERVER['REQUEST_METHOD'];

        foreach (self::$routes[$method] as $route => $callback) {

            $response = null;

            if (strpos($route, ':') !== false) {
                $route = preg_replace('#:[a-zA-Z]+#', '([a-zA-Z]+)', $route);
            }

            if (preg_match("#^$route$#", $uri, $matches)) {


                $params = array_slice($matches, 1);

                if (is_callable($callback)) {
                    $response = $callback(...$params);
                }

                if (is_array($callback)){
                    $controller = new $callback[0];
                    $response = $controller->{$callback[1]}(...$params);
                }

                if (is_array($response) || is_object($response)) {
                    header('Content-type: application/json');
                    echo json_encode($response);
                }else{
                    echo $response;
                }

                return;
            }
        }

        //echo '404 Not Found';
        header('Content-Type: application/json; charset=utf-8');
        $response['result'] = false;
        $response['icon'] = "error";
        $response['title'] = '404 Not Found';
        $response['text'] = "Errores 404 (Page Not Found) de página no encontrada";
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        exit();
    }

    protected static function getPathDominio(): string
    {
        $response = '';
        // Obtener el protocolo (http o https)
        $protocolo = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        // Obtener el nombre del host
        $host = $_SERVER['HTTP_HOST'];
        //url actual
        $url = $protocolo . $host;

        $cadena = APP_URL;

        $explode = explode($url, $cadena);
        if (count($explode) > 1){
            $response = trim($explode[1], '/');
            $response = $response.'/';
        }

        return $response;
    }

}