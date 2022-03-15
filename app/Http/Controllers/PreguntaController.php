<?php

namespace App\Http\Controllers;
use App\Models\Evaluacion;
use App\Models\Pregunta;
use App\Http\Requests\StorePreguntaRequest;
use App\Http\Requests\UpdatePreguntaRequest;

class PreguntaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $preguntas = Pregunta::join('evaluacions','evaluacions.id','=','preguntas.evaluacion_id')
                    ->join('users','users.id','=','evaluacions.docente_id')
                    ->join('cursos','cursos.id','=','evaluacions.curso_id')
                    ->join('salons','salons.docente_id','=','users.id')
                    ->where('evaluacions.id',$id)
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
                    ]);

        $datos = Evaluacion::join('users','users.id','=','evaluacions.docente_id')
                    ->join('cursos','cursos.id','=','evaluacions.curso_id')
                    ->join('salons','salons.docente_id','=','users.id')
                    ->where('evaluacions.id',$id)
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
                    ]);

        return view('backend.pregunta.index', compact('preguntas','datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $datos = Evaluacion::join('users','users.id','=','evaluacions.docente_id')
                    ->join('cursos','cursos.id','=','evaluacions.curso_id')
                    ->join('salons','salons.docente_id','=','users.id')
                    ->where('evaluacions.id',$id)
                    ->get(['evaluacions.id as evaluacion_id'
                    ,'evaluacions.titulo as evaluacion_titulo'
                    ,'evaluacions.detalle as evaluacion_detalle'
                    ,'evaluacions.fecha as evaluacion_fecha'
                    ,'cursos.grado as curso_grado'
                    ,'cursos.nombre as curso_nombre'
                    ,'cursos.nivel as curso_nivel'
                    ,'users.id as usuario_id'
                    ,'users.name as usuario_nombre'
                    ,'users.last_name as usuario_apellidos'
                    ,'salons.seccion as salon_seccion'
                    ]);
        
        return view('backend.pregunta.create', compact('datos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePreguntaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePreguntaRequest $request)
    {
        $this->validate($request, [
            'evaluacion_id'  =>  'required|max:250',
            'pregunta_detalle'  =>  'required|max:250',
            'pregunta_puntaje'  =>  'required|max:10',
            'estado' => 'required|max:1'
        ]);

        $pregunta = new Pregunta;
        $pregunta->evaluacion_id = $request->evaluacion_id;
        $pregunta->detalle = $request->pregunta_detalle;
        $pregunta->puntaje = $request->pregunta_puntaje;
        $pregunta->estado = $request->estado;

        $idevaluacion = $request->evaluacion_id;

        $pregunta->save();    
        return redirect()->route('preguntaIndex',$idevaluacion);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function show(Pregunta $pregunta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function edit(Pregunta $pregunta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePreguntaRequest  $request
     * @param  \App\Models\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePreguntaRequest $request, Pregunta $pregunta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pregunta $pregunta)
    {
        //
    }
}
