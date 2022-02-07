<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RestauranteController;
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
    return view('index');
});

Route::get('/restaurante', function () {
    return view('restaurante');
});

Route::get('loginPOST',[UsuarioController::class, 'login']);

Route::post('leer',[UsuarioController::class, 'index']);

Route::post('login_ajax',[UsuarioController::class, 'login_ajax']);

Route::post('registro_ajax',[UsuarioController::class, 'registro_ajax']);

Route::post('edicion_restaurante_ajax',[RestauranteController::class, 'editar']);

Route::post('creacion_restaurante_ajax',[RestauranteController::class, 'crear']);

Route::post('logout',[UsuarioController::class, 'logout']);