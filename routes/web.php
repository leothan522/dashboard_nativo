<?php

use app\Controllers\InicioController;
use lib\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí es donde puedes registrar rutas web para tu aplicación. Estas
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


Route::get('/', [InicioController::class, 'index']);
Route::post('post', [InicioController::class, 'testGUMP']);


/*
| Esto debe estar siempre al final, ejecuta el enrutador y compara las rutas en el orden en
| que se definieron arriba, la primera que coincida se ejecuta, tener en cuenta con rutas con
| la misma uri. la comparacion es independiente al metodo
*/
Route::dispatch();
