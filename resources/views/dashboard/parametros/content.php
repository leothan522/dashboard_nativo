<?php

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

$uri = str_replace($cadena, '', getURLActual());// getURLActual();


echo trim($uri, '/');

echo "<br />";

echo route('parametros');

echo "<br />";

if (getURLActual() == route('parametros')){
    echo "Son iguales.";
}
