<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\UnidadController;

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
    return view('welcome');
});

Auth::routes();


Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::group(['prefix' => 'usuario/'], function(){
        Route::get('index', [UserController::class, 'index'])->name('usuarioIndex');
        Route::get('create', [UserController::class, 'create'])->name('usuarioCreate');
        Route::post('store', [UserController::class, 'store'])->name('usuarioStore');
        Route::get('edit/{id}', [UserController::class, 'edit'])->name('usuarioEdit');
        Route::post('update/{id}', [UserController::class, 'update'])->name('usuarioUpdate');
    });
    Route::group(['prefix' => 'curso/'], function(){
        Route::get('index', [CursoController::class, 'index'])->name('cursoIndex');
        Route::get('create', [CursoController::class, 'create'])->name('cursoCreate');
        Route::post('store', [CursoController::class, 'store'])->name('cursoStore');
        Route::get('edit/{id}', [CursoController::class, 'edit'])->name('cursoEdit');
        Route::post('update/{id}', [CursoController::class, 'update'])->name('cursoUpdate');
    });
    Route::group(['prefix' => 'material/'], function(){
        Route::get('index/{id}', [MaterialController::class, 'index'])->name('materialIndex');
        Route::get('create', [MaterialController::class, 'create'])->name('materialCreate');
        Route::post('store', [MaterialController::class, 'store'])->name('materialStore');
        Route::get('edit/{id}', [MaterialController::class, 'edit'])->name('materialEdit');
        Route::post('update/{id}', [MaterialController::class, 'update'])->name('materialUpdate');
    });
    Route::group(['prefix' => 'unidad/'], function(){
        Route::get('index/{id}', [UnidadController::class, 'index'])->name('unidadIndex');
        Route::get('create', [UnidadController::class, 'create'])->name('unidadCreate');
        Route::post('store', [UnidadController::class, 'store'])->name('unidadStore');
        Route::get('edit/{id}', [UnidadController::class, 'edit'])->name('unidadEdit');
        Route::post('update/{id}', [UnidadController::class, 'update'])->name('unidadUpdate');
    });
});