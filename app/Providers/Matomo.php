<?php

namespace app\Providers;

use DeviceDetector\ClientHints;
use DeviceDetector\DeviceDetector;
use JetBrains\PhpStorm\NoReturn;

class Matomo
{
    public static function getDeviceDetector(): DeviceDetector
    {
        try {
            $userAgent = $_SERVER['HTTP_USER_AGENT'];
            $clientHints = ClientHints::factory($_SERVER);
            $dd = new DeviceDetector($userAgent, $clientHints);
            $dd->parse();
            return $dd;
        }catch (\Error|\Exception $e){
            self::showError('Error en el Provider Matomo', $e);
        }
    }

    #[NoReturn] protected static function showError($title, $e, $isText = false): void
    {
        if ($isText){
            $message = $e;
        }else{
            $message = $e->getMessage();
        }
        header('Content-Type: application/json; charset=utf-8');
        $response['ok'] = false;
        $response['toast'] = "error";
        $response['title'] = $title;
        $response['message'] = $message;
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        exit();
    }

}