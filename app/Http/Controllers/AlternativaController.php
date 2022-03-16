<?php

namespace App\Http\Controllers;
use App\Models\Pregunta;
use App\Models\Alternativa;
use App\Http\Requests\StoreAlternativaRequest;
use App\Http\Requests\UpdateAlternativaRequest;

class AlternativaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $alternativas = Alternativa::join('preguntas','preguntas.id','=','alternativas.pregunta_id')
                    ->join('evaluacions','evaluacions.id','=','preguntas.evaluacion_id')
                    ->join('users','users.id','=','evaluacions.docente_id')
                    ->join('cursos','cursos.id','=','evaluacions.curso_id')
                    ->join('salons','salons.docente_id','=','users.id')
                    ->where('preguntas.id',$id)
                    ->get(['evaluacions.id as evaluacion_id'
                    ,'evaluacions.titulo as evaluacion_titulo'
                    ,'evaluacions.detalle as evaluacion_detalle'
                    ,'preguntas.id as pregunta_id'
                    ,'preguntas.detalle as pregunta_detalle'
                    ,'preguntas.puntaje as pregunta_puntaje'
                    ,'preguntas.estado as pregunta_estado'
                    ,'cursos.nombre as curso_nombre'
                    ,'cursos.nivel as curso_nivel'
                    ,'users.id as usuario_id'
                    ,'users.name as usuario_nombre'
                    ,'users.last_name as usuario_apellidos'
                    ,'salons.grado as salon_grado'
                    ,'salons.seccion as salon_seccion'
                    ,'alternativas.detalle as alternativa_detalle'
                    ,'alternativas.respuesta as alternativa_respuesta'
                    ,'alternativas.estado as alternativa_estado'
                    ]);

        $datos = Pregunta::join('evaluacions','evaluacions.id','=','preguntas.evaluacion_id')
                    ->join('users','users.id','=','evaluacions.docente_id')
                    ->join('cursos','cursos.id','=','evaluacions.curso_id')
                    ->join('salons','salons.docente_id','=','users.id')
                    ->where('preguntas.id',$id)
                    ->get(['evaluacions.id as evaluacion_id'
                    ,'evaluacions.titulo as evaluacion_titulo'
                    ,'evaluacions.detalle as evaluacion_detalle'
                    ,'cursos.nombre as curso_nombre'
                    ,'cursos.nivel as curso_nivel'
                    ,'users.id as usuario_id'
                    ,'users.name as usuario_nombre'
                    ,'users.last_name as usuario_apellidos'
                    ,'salons.grado as salon_grado'
                    ,'salons.seccion as salon_seccion'
                    ,'preguntas.detalle as pregunta_detalle'
                    ]);
  
        
        return view('backend.alternativa.index', compact('alternativas','datos'));
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
     * @param  \App\Http\Requests\StoreAlternativaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAlternativaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alternativa  $alternativa
     * @return \Illuminate\Http\Response
     */
    public function show(Alternativa $alternativa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alternativa  $alternativa
     * @return \Illuminate\Http\Response
     */
    public function edit(Alternativa $alternativa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAlternativaRequest  $request
     * @param  \App\Models\Alternativa  $alternativa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAlternativaRequest $request, Alternativa $alternativa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alternativa  $alternativa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alternativa $alternativa)
    {
        //
    }
}
