<?php

use Carbon\Carbon;

function generarStringAleatorio($largo = 10, $soloNumeros = false , $espacio = false): string
{
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    if ($soloNumeros){
        $caracteres = '0123456789';
    }
    $caracteres = $espacio ? $caracteres . ' ' : $caracteres;
    $string = '';
    for ($i = 0; $i < $largo; $i++) {
        $string .= $caracteres[rand(0, strlen($caracteres) - 1)];
    }
    return $string;
}

function verUtf8($string, $safeNull = false): string
{
    //$utf8_string = "Some UTF-8 encoded BATE QUEBRADO ÑñíÍÁÜ niño ó Ó string: é, ö, ü";
    $response = null;
    $text = 'NULL';
    if ($safeNull){
        $text = '';
    }
    if (!is_null($string)){
        $response = mb_convert_encoding($string, 'ISO-8859-1', 'UTF-8');
    }
    if (!is_null($response)){
        $text = "$response";
    }
    return $text;
}

function getFecha($fecha = null, $format = null): string
{
    if (is_null($fecha)){
        if (is_null($format)){
            $date = Carbon::now(APP_TIMEZONE)->toDateTimeString();
        }else{
            $date = Carbon::now(APP_TIMEZONE)->format($format);
        }
    }else{
        if (is_null($format)){
            $date = Carbon::parse($fecha)->format('d/m/Y');
        }else{
            $date = Carbon::parse($fecha)->format($format);
        }
    }
    return $date;
}

function haceCuanto($fecha): string
{
    return Carbon::parse($fecha)->diffForHumans();
}

// Obtener la fecha en español
function fechaEnLetras($fecha, $isoFormat = null): string
{
    // dddd => Nombre del DIA ejemplo: lunes
    // MMMM => nombre del mes ejemplo: febrero
    $format = "dddd D [de] MMMM [de] YYYY"; // fecha completa
    if (!is_null($isoFormat)){
        $format = $isoFormat;
    }
    return Carbon::parse($fecha)->isoFormat($format);
}

//Leer JSON
function leerJson($json, $key)
{
    if ($json == null) {
        return null;
    } else {
        $json = $json;
        $json = json_decode($json, true);
        if (array_key_exists($key, $json)) {
            return $json[$key];
        } else {
            return null;
        }
    }
}

function listarDias(): array
{
    return ["Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado"];
}

function ListarMeses(): array
{
    return ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
}

function formatoMillares($cantidad, $decimal = 2): string
{
    if (!is_numeric($cantidad)){
        $cantidad = 0;
    }
    return number_format($cantidad, $decimal, ',', '.');
}

function cerosIzquierda($cantidad, $cantCeros = 2): int|string
{
    if ($cantidad == 0) {
        return 0;
    }
    return str_pad($cantidad, $cantCeros, "0", STR_PAD_LEFT);
}

function obtenerPorcentaje($cantidad, $total): float|int
{
    if ($total != 0) {
        $porcentaje = ((float)$cantidad * 100) / $total; // Regla de tres
        $porcentaje = round($porcentaje, 2);  // Quitar los decimales
        return $porcentaje;
    }
    return 0;
}

//Función comprueba una hora entre un rango
function hourIsBetween($from, $to, $input): bool
{
    $dateFrom = DateTime::createFromFormat('!H:i', $from);
    $dateTo = DateTime::createFromFormat('!H:i', $to);
    $dateInput = DateTime::createFromFormat('!H:i', $input);
    if ($dateFrom > $dateTo) $dateTo->modify('+1 day');
    return ($dateFrom <= $dateInput && $dateInput <= $dateTo) || ($dateFrom <= $dateInput->modify('+1 day') && $dateInput <= $dateTo);
    /*En la función lo que haremos será pasarle, el desde y el hasta del rango de horas que queremos que se encuentre y el datetime con la hora que nos llega.
Comprobaremos si la segunda hora que le pasamos es inferior a la primera, con lo cual entenderemos que es para el día siguiente.
Y al final devolveremos true o false dependiendo si el valor introducido se encuentra entre lo que le hemos pasado.*/
}

function crearResponse($title, $message, $result = false, $icon = 'error'): array
{
    if ($result){ $icon = 'success'; }
    $response['result'] = $result;
    $response['icon'] = $icon;
    $response['title'] = $title;
    $response['message'] = $message;
    return $response;
}

function getRowquid($model): string
{
    do{
        $rowquid = generarStringAleatorio(16);
        $existe = $model->where('rowquid', $rowquid)->first();
    }while($existe);
    return $rowquid;
}

/*function getDataSelect2($rows, $text, $id = "rowquid"): array
{
    $data = [];
    $filas = $rows->toArray();
    foreach ($filas as $row){
        $option = [
            'id' => $row[$id],
            'text' => $row[$text]
        ];
        $data[] = $option;
    }
    return $data;
}*/

