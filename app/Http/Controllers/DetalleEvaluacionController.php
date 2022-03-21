<?php

namespace App\Http\Controllers;
use App\Models\Calificacion;
use App\Models\DetalleEvaluacion;
use App\Http\Requests\StoredetalleEvaluacionRequest;
use App\Http\Requests\UpdatedetalleEvaluacionRequest;

class DetalleEvaluacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idevaluacion,$idusuario)
    {
        $respuestas = DetalleEvaluacion::join('evaluacions','evaluacions.id','=','detalle_evaluacions.evaluacion_id')
                    ->join('preguntas','preguntas.id','=','detalle_evaluacions.pregunta_id')
                    ->join('alternativas','alternativas.id','=','detalle_evaluacions.alternativa_id')
                    ->join('users','users.id','=','detalle_evaluacions.alumno_id')
                    ->where('evaluacions.id',$idevaluacion)
                    ->where('users.id',$idusuario)
                    ->get(['preguntas.detalle as pregunta_detalle'
                    ,'alternativas.detalle as alternativa_detalle'
                    ,'alternativas.respuesta as alternativa_respuesta'
                    ,'preguntas.puntaje as pregunta_Puntaje'
                    ]);
        $datos = Calificacion::join('evaluacions','evaluacions.id','=','calificacions.evaluacion_id')
                    ->join('users','users.id','=','calificacions.alumno_id')
                    ->join('cursos','cursos.id','=','evaluacions.curso_id')
                    ->join('lista_alumnos','lista_alumnos.alumno_id','=','users.id')
                    ->join('salons','salons.id','=','lista_alumnos.salon_id')
                    ->where('evaluacions.id',$idevaluacion)
                    ->where('users.id',$idusuario)
                    ->get(['evaluacions.titulo as evaluacion_titulo'
                    ,'salons.grado as salon_grado'
                    ,'salons.seccion as salon_seccion'
                    ,'cursos.nombre as curso_nombre'
                    ,'cursos.nivel as curso_nivel'
                    ,'calificacions.nota as calificacion_nota'
                    ,'users.name as usuario_nombre'
                    ,'users.last_name as usuario_apellidos'
                    ]);
        return view('backend.detalleevaluacion.index', compact('respuestas','datos'));            
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
     * @param  \App\Http\Requests\StoredetalleEvaluacionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredetalleEvaluacionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\detalleEvaluacion  $detalleEvaluacion
     * @return \Illuminate\Http\Response
     */
    public function show(detalleEvaluacion $detalleEvaluacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\detalleEvaluacion  $detalleEvaluacion
     * @return \Illuminate\Http\Response
     */
    public function edit(detalleEvaluacion $detalleEvaluacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedetalleEvaluacionRequest  $request
     * @param  \App\Models\detalleEvaluacion  $detalleEvaluacion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedetalleEvaluacionRequest $request, detalleEvaluacion $detalleEvaluacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\detalleEvaluacion  $detalleEvaluacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(detalleEvaluacion $detalleEvaluacion)
    {
        //
    }
}
