<?php

namespace App\Http\Controllers;
use App\Models\Pregunta;
use App\Models\Alternativa;
use App\Http\Requests\StoreAlternativaRequest;
use App\Http\Requests\UpdateAlternativaRequest;
use Illuminate\Http\Request;

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
                    ,'alternativas.id as alternativa_id'
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
                    ,'preguntas.id as pregunta_id'
                    ,'preguntas.detalle as pregunta_detalle'
                    ]);
  
        
        return view('backend.alternativa.index', compact('alternativas','datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $datos = Pregunta::join('evaluacions','evaluacions.id','=','preguntas.evaluacion_id')
                    ->join('users','users.id','=','evaluacions.docente_id')
                    ->join('cursos','cursos.id','=','evaluacions.curso_id')
                    ->join('salons','salons.docente_id','=','users.id')
                    ->where('preguntas.id',$id)
                    ->get(['evaluacions.id as evaluacion_id'
                    ,'evaluacions.titulo as evaluacion_titulo'
                    ,'evaluacions.detalle as evaluacion_detalle'
                    ,'evaluacions.fecha as evaluacion_fecha'
                    ,'cursos.nombre as curso_nombre'
                    ,'cursos.grado as curso_grado'
                    ,'cursos.nivel as curso_nivel'
                    ,'users.id as usuario_id'
                    ,'users.name as usuario_nombre'
                    ,'users.last_name as usuario_apellidos'
                    ,'salons.seccion as salon_seccion'
                    ,'preguntas.id as pregunta_id'
                    ,'preguntas.detalle as pregunta_detalle'
                    ,'preguntas.puntaje as pregunta_puntaje'
                    ]);
        return view('backend.alternativa.create', compact('datos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAlternativaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAlternativaRequest $request)
    {
        $this->validate($request, [
            'pregunta_id'  =>  'required|max:250',
            'alternativa_detalle'  =>  'required|max:250',
            'alternativa_respuesta'  =>  'required|max:1',
            'estado' => 'required|max:1'
        ]);

        $alternativa = new Alternativa;
        $alternativa->pregunta_id = $request->pregunta_id;
        $alternativa->detalle = $request->alternativa_detalle;
        $alternativa->respuesta = $request->alternativa_respuesta;
        $alternativa->estado = $request->estado;

        $idpregunta = $request->pregunta_id;

        $alternativa->save();    
        return redirect()->route('alternativaIndex',$idpregunta);
    
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
    public function edit($id)
    {
        $alternativa = Alternativa::join('preguntas','preguntas.id','=','alternativas.pregunta_id')
                    ->join('evaluacions','evaluacions.id','=','preguntas.evaluacion_id')
                    ->join('users','users.id','=','evaluacions.docente_id')
                    ->join('cursos','cursos.id','=','evaluacions.curso_id')
                    ->join('salons','salons.docente_id','=','users.id')
                    ->where('alternativas.id',$id)
                    ->get(['evaluacions.id as evaluacion_id'
                    ,'evaluacions.titulo as evaluacion_titulo'
                    ,'evaluacions.detalle as evaluacion_detalle'
                    ,'evaluacions.fecha as evaluacion_fecha'
                    ,'preguntas.id as pregunta_id'
                    ,'preguntas.detalle as pregunta_detalle'
                    ,'preguntas.puntaje as pregunta_puntaje'
                    ,'preguntas.estado as pregunta_estado'
                    ,'cursos.nombre as curso_nombre'
                    ,'cursos.nivel as curso_nivel'
                    ,'cursos.grado as curso_grado'
                    ,'users.id as usuario_id'
                    ,'users.name as usuario_nombre'
                    ,'users.last_name as usuario_apellidos'
                    ,'salons.seccion as salon_seccion'
                    ,'alternativas.id as alternativa_id'
                    ,'alternativas.detalle as alternativa_detalle'
                    ,'alternativas.respuesta as alternativa_respuesta'
                    ,'alternativas.estado as alternativa_estado'
                    ]);
        return view('backend.alternativa.edit', compact('alternativa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAlternativaRequest  $request
     * @param  \App\Models\Alternativa  $alternativa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $idpregunta)
    {
        $alternativa           = Alternativa::find($id);
        $alternativa->detalle = $request->alternativa_detalle;
        $alternativa->respuesta = $request->alternativa_respuesta;
        $alternativa->estado = $request->alternativa_estado;
        
        $alternativa->save();
        return redirect()->route('alternativaIndex',$idpregunta);
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
