<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Calificacion;
use App\Models\Evaluacion;
use App\Http\Requests\StoreCalificacionRequest;
use App\Http\Requests\UpdateCalificacionRequest;

class CalificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idevaluacion)
    {
        $calificaciones = Calificacion::join('evaluacions','evaluacions.id','=','calificacions.evaluacion_id')
                    ->join('cursos','cursos.id','=','evaluacions.curso_id')
                    ->join('users','users.id','=','calificacions.alumno_id')
                    ->where('evaluacions.id',$idevaluacion)
                    ->get(['users.id as usuario_id'
                    ,'users.name as usuario_nombre'
                    ,'users.last_name as usuario_apellidos'
                    ,'cursos.nombre as curso_nombre'
                    ,'calificacions.nota as calificacion_nota'
                    ,'evaluacions.id as evaluacion_id'
                    ]);

        $datos =  Evaluacion::join('cursos','cursos.id','=','evaluacions.curso_id')
                ->join('users','users.id','=','evaluacions.docente_id')
                ->join('salons','salons.docente_id','=','users.id')
                ->where('evaluacions.id',$idevaluacion)
                ->where('salons.estado',true)
                ->where('cursos.estado',true)
                ->get(['evaluacions.id as evaluacion_id'
                ,'evaluacions.titulo as evaluacion_titulo'
                ,'evaluacions.detalle as evaluacion_detalle'
                ,'evaluacions.fecha as evaluacion_fecha'
                ,'evaluacions.estado as evaluacion_estado'
                ,'cursos.id as curso_id'
                ,'cursos.nombre as curso_nombre'
                ,'cursos.nivel as curso_nivel'
                ,'users.id as usuario_id'
                ,'users.name as usuario_nombre'
                ,'users.last_name as usuario_apellidos'
                ,'salons.grado as salon_grado'
                ,'salons.seccion as salon_seccion'
        ]);

        return view('backend.calificacion.index', compact('calificaciones','datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCalificacionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCalificacionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Calificacion  $calificacion
     * @return \Illuminate\Http\Response
     */
    public function show(Calificacion $calificacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Calificacion  $calificacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Calificacion $calificacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCalificacionRequest  $request
     * @param  \App\Models\Calificacion  $calificacion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCalificacionRequest $request, Calificacion $calificacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Calificacion  $calificacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calificacion $calificacion)
    {
        //
    }
}
