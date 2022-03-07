<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\UserController;

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
});