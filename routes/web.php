<?php

use Illuminate\Support\Facades\Route;
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
    return view('principal');
});
Route::get('/restaurante/{id}', [RestauranteController::class, 'mostrarControler']);

Route::post('leer',[RestauranteController::class, 'leerControler']);

Route::post('login_ajax',[UsuarioController::class, 'login_ajax']);

Route::post('registro_ajax',[UsuarioController::class, 'registro_ajax']);

Route::post('logout',[UsuarioController::class, 'logout']);
