<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\UnidadController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\SalonController;
use App\Http\Controllers\ListaAlumnoController;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\EvaluacionController;
use App\Http\Controllers\PreguntaController;
use App\Http\Controllers\AlternativaController;
use App\Http\Controllers\CalificacionController;
use App\Http\Controllers\DetalleEvaluacionController;

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
    return redirect()->route('login');
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
        Route::get('cursodocente/{usu}', [CursoController::class, 'cursoDocenteLista'])->name('cursoDocenteLista');
        Route::get('cursoalumno/{usu}', [CursoController::class, 'cursoAlumnoLista'])->name('cursoAlumnoLista');
        Route::get('create', [CursoController::class, 'create'])->name('cursoCreate');
        Route::post('store', [CursoController::class, 'store'])->name('cursoStore');
        Route::get('edit/{curso}', [CursoController::class, 'edit'])->name('cursoEdit');
        Route::post('update/{curso}', [CursoController::class, 'update'])->name('cursoUpdate');
    });
    Route::group(['prefix' => 'material/'], function(){
        Route::get('index/{docente}/{curso}', [MaterialController::class, 'index'])->name('materialIndex');
        Route::get('create/{id}', [MaterialController::class, 'create'])->name('materialCreate');
        Route::post('store', [MaterialController::class, 'store'])->name('materialStore');
        Route::get('edit/{id}', [MaterialController::class, 'edit'])->name('materialEdit');
        Route::post('update/{id}/{docente}/{curso}', [MaterialController::class, 'update'])->name('materialUpdate');
    });
    Route::group(['prefix' => 'evaluacion/'], function(){
        Route::get('index/{docente}/{curso}', [EvaluacionController::class, 'index'])->name('evaluacionIndex');
        Route::get('indexalumno/{alumno}/{curso}', [EvaluacionController::class, 'indexAlumno'])->name('evaluacionAlumnoIndex');
        Route::get('create/{id}', [EvaluacionController::class, 'create'])->name('evaluacionCreate');
        Route::post('store', [EvaluacionController::class, 'store'])->name('evaluacionStore');
        Route::get('edit/{id}', [EvaluacionController::class, 'edit'])->name('evaluacionEdit');
        Route::post('update/{id}/{docente}/{curso}', [EvaluacionController::class, 'update'])->name('evaluacionUpdate');
        Route::get('examen/{id}', [EvaluacionController::class, 'show'])->name('examen');
        Route::get('resultado/{id}/{alumno}/{curso}', [EvaluacionController::class, 'showCalificacion'])->name('resultado');
    });
    Route::group(['prefix' => 'calificacion/'], function(){
        Route::get('index/{idevaluacion}', [CalificacionController::class, 'index'])->name('calificacionIndex');
    });
    Route::group(['prefix' => 'detalleevaluacion/'], function(){
        Route::get('index/{idevaluacion}/{idusuario}', [DetalleEvaluacionController::class, 'index'])->name('detalleevaluacionIndex');
        Route::post('store', [DetalleEvaluacionController::class, 'store'])->name('detalleEvaluacionStore');
    });

    Route::group(['prefix' => 'pregunta/'], function(){
        Route::get('index/{id}', [PreguntaController::class, 'index'])->name('preguntaIndex');
        Route::get('create/{id}', [PreguntaController::class, 'create'])->name('preguntaCreate');
        Route::post('store', [PreguntaController::class, 'store'])->name('preguntaStore');
        Route::get('edit/{id}', [PreguntaController::class, 'edit'])->name('preguntaEdit');
        Route::post('update/{id}/{evaluacion}', [PreguntaController::class, 'update'])->name('preguntaUpdate');
    });

    Route::group(['prefix' => 'alternativa/'], function(){
        Route::get('index/{id}', [AlternativaController::class, 'index'])->name('alternativaIndex');
        Route::get('create/{id}', [AlternativaController::class, 'create'])->name('alternativaCreate');
        Route::post('store', [AlternativaController::class, 'store'])->name('alternativaStore');
        Route::get('edit/{id}', [AlternativaController::class, 'edit'])->name('alternativaEdit');
        Route::post('update/{id}/{pregunta}', [AlternativaController::class, 'update'])->name('alternativaUpdate');
    });

    Route::group(['prefix' => 'unidad/'], function(){
        Route::get('index/{id}', [UnidadController::class, 'index'])->name('unidadIndex');
        Route::get('create/{id}', [UnidadController::class, 'create'])->name('unidadCreate');
        Route::post('store', [UnidadController::class, 'store'])->name('unidadStore');
        Route::get('edit/{id}', [UnidadController::class, 'edit'])->name('unidadEdit');
        Route::post('update/{id}/{idmaterial}', [UnidadController::class, 'update'])->name('unidadUpdate');
    }); 
    Route::group(['prefix' => 'actividad/'], function(){
        Route::get('index/{id}', [ActividadController::class, 'index'])->name('actividadIndex');
        Route::get('create/{id}', [ActividadController::class, 'create'])->name('actividadCreate');
        Route::post('store', [ActividadController::class, 'store'])->name('actividadStore');
        Route::get('edit/{id}', [ActividadController::class, 'edit'])->name('actividadEdit');
        Route::post('update/{id}/{idunidad}', [ActividadController::class, 'update'])->name('actividadUpdate');
    });   
    Route::group(['prefix' => 'salon/'], function(){
        Route::get('index', [SalonController::class, 'index'])->name('salonIndex');
        Route::get('create', [SalonController::class, 'create'])->name('salonCreate');
        Route::post('store', [SalonController::class, 'store'])->name('salonStore');
        Route::get('edit/{id}', [SalonController::class, 'edit'])->name('salonEdit');
        Route::post('update/{id}', [SalonController::class, 'update'])->name('salonUpdate');
    });
    Route::group(['prefix' => 'listaAlumno/'], function(){
        Route::get('index/{id}', [ListaAlumnoController::class, 'index'])->name('listaAlumnoIndex');
        Route::get('{salon_id}/create', [ListaAlumnoController::class, 'create'])->name('listaAlumnoCreate');
        Route::post('store', [ListaAlumnoController::class, 'store'])->name('listaAlumnoStore');
        Route::get('edit/{id}', [ListaAlumnoController::class, 'edit'])->name('listaAlumnoEdit');
        Route::post('update/{id}', [ListaAlumnoController::class, 'update'])->name('listaAlumnoUpdate');
    });
});
