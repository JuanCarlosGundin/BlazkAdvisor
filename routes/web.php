<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestauranteController;
use App\Http\Controllers\UsuarioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('principal');
});
Route::get('/restaurante/{id}', [RestauranteController::class, 'mostrarControler']);

//LEER EL CONTENIDO
Route::post('leer',[RestauranteController::class, 'leerControler']);
//Editar el contenido
Route::post('edicion_restaurante_ajax',[RestauranteController::class, 'editar']);
//RUTA PARA DESACTIVAR 
Route::post('desactivar_activar_ajax',[RestauranteController::class, 'desactivar_activar']);
//RUTA PARA ACTIVAR
Route::post('creacion_restaurante_ajax',[RestauranteController::class, 'crear']);
//RUTA PARA LOGEARSE
Route::post('login_ajax',[UsuarioController::class, 'login_ajax']);
//logout
Route::post('logout',[UsuarioController::class, 'logout']);
//Registrarse
Route::post('registro_ajax',[UsuarioController::class, 'registro_ajax']);
