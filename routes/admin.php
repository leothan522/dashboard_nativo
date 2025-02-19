<?php

use app\Controllers\dashboard\ParametrosController;
use app\Controllers\test\TestController;
use lib\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Aquí es donde puedes registrar rutas ADMIN para tu aplicación. Estas
| rutas son cargadas por lib\Facades\Route.php y todas ellas pueden
| ser de tipo GET o POST y aceptan parametros utilizando el simbolo :
| seguido del nombre que va a tener dicho parametro. EJEMPLO

Route::get("/blog/:slug", function($slug){
    return 'hola mundo con parametro: '.$slug;
});

| Todas las rutas pueden llamar a un controlador. para ello se le pasa como
| segundo argumento un array con dos posiciones, la primera indicando la clase
| del controlador y la segunda indicando el metodo a ejecutar. EJEMPLO:

Route::get("home",[HomeController::class,'index']);

| La sistaxis es simple el primer argumento es la uri y el segundo una funcion
| calback o un controlador. ¡Haz algo genial!
*/

//TEST ******************************************************************************************

Route::get('test', [TestController::class, 'index']);
Route::post('test', [TestController::class, 'testGUMP']);

//DASHBOARD **************************************************************************************
Route::get('parametros', [ParametrosController::class, 'index']);
Route::post('parametro', [ParametrosController::class, 'store']);
Route::post('parametros/setLimit', [ParametrosController::class, 'setLimit']);




/*
| Este archivo depende de "routes/web.php" para ejecutarse, asqui que deben
| estar los dos para funcionar y se autocargar con composer
*/