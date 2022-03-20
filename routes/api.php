<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ActividadController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('user/{grado}/{seccion}', [UserController::class, 'obtenerDocentesFiltrado']);
Route::get('obtenerAyudaActividad/{grado}/{seccion}/{curso}/{material}/{pagina}/{numero}', [ActividadController::class, 'obtenerAyudaFiltrado']);
Route::get('obtenerDescripcionActividad/{grado}/{seccion}/{curso}/{material}/{pagina}/{numero}', [ActividadController::class, 'obtenerAyudaFiltrado']);