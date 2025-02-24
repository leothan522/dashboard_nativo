<?php

use app\Controllers\web\AuthController;
use app\Controllers\web\GuestController;
use app\Controllers\web\ProfileController;
use app\Controllers\web\WebController;
use app\Controllers\web\WellcomeController;
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


Route::get('/', [WellcomeController::class, 'index']);

//AUTH *************************************************************************************
Route::get('login', [GuestController::class, 'login']);
Route::post('login', [AuthController::class, 'login']);

Route::get('register', [GuestController::class, 'register']);
Route::post('register', [AuthController::class, 'register']);

Route::get('forgot/password', [GuestController::class, 'forgotPassword']);
Route::post('forgot/password', [AuthController::class, 'forgotPassword']);

Route::get('reset/password', [GuestController::class, 'resetPassword']);
Route::post('reset/password', [AuthController::class, 'resetPassword']);
Route::get('reset/password/:token', [AuthController::class, 'resetPasswordEmail']);

Route::get('verify/email', [AuthController::class, 'validateEmail']);
Route::post('verify/email', [AuthController::class, 'reenviarEmail']);
Route::get('verify/email/:token', [AuthController::class, 'verifyEmail']);

Route::get('expired/token', [AuthController::class, 'expiredToken']);

Route::get('logout', [AuthController::class, 'logout']);


//WEB **********************************************************************************************
Route::get('web', [WebController::class, 'index']);

Route::get('web/profile', [ProfileController::class, 'index']);


/*
| Esto debe estar siempre al final, ejecuta el enrutador y compara las rutas en el orden en
| que se definieron arriba, la primera que coincida se ejecuta, tener en cuenta con rutas con
| la misma uri. la comparacion es independiente al metodo
*/
Route::dispatch();
