<?php

namespace App\Http\Controllers;
use App\Models\Curso;
use App\Models\Evaluacion;
use App\Models\Pregunta;
use App\Models\Alternativa;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEvaluacionRequest;
use App\Http\Requests\UpdateEvaluacionRequest;

class EvaluacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idusuario, $idcurso)
    {
        $evaluaciones = Evaluacion::join('cursos','cursos.id','=','evaluacions.curso_id')
                    ->join('users','users.id','=','evaluacions.docente_id')
                    ->join('salons','salons.docente_id','=','users.id')
                    ->where('evaluacions.docente_id',$idusuario)
                    ->where('cursos.id',$idcurso)
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

        $datos = Curso::join('salons','salons.grado','=','cursos.grado')
                    ->join('users','users.id','=','salons.docente_id')
                    ->where('users.id',$idusuario)
                    ->where('cursos.id',$idcurso)
                    ->where('salons.estado',true)
                    ->get(['salons.grado as salon_grado'
                    ,'salons.seccion as salon_seccion'
                    ,'salons.nivel as salon_nivel'
                    ,'cursos.id as curso_id'
                    ,'cursos.nombre as nombrecurso'
                    ,'cursos.nivel as curso_nivel'
                    ,'users.name as usuario_nombre'
                    ,'users.last_name as usuario_apellidos']);
        return view('backend.evaluacion.index', compact('evaluaciones','datos'));
    }

    public function indexAlumno($idusuario, $idcurso)
    {
        $evaluaciones = Evaluacion::join('cursos','cursos.id','=','evaluacions.curso_id')
                    ->join('users','users.id','=','evaluacions.docente_id')
                    ->leftJoin('calificacions','calificacions.evaluacion_id','=','evaluacions.id')
                    ->join('salons','salons.docente_id','=','users.id')
                    ->join('lista_alumnos','lista_alumnos.salon_id','=','salons.id')
                    ->where('lista_alumnos.alumno_id',$idusuario)
                    ->where('cursos.id',$idcurso)
                    ->where('salons.estado',true)
                    ->where('cursos.estado',true)
                    ->get(['evaluacions.id as evaluacion_id'
                    ,'evaluacions.titulo as evaluacion_titulo'
                    ,'evaluacions.fecha as evaluacion_fecha'
                    ,'calificacions.nota as nota_alumno'
                    ,'salons.grado as salon_grado'
                    ,'salons.seccion as salon_seccion'
                    ]);

        $datos = Curso::join('salons','salons.grado','=','cursos.grado')
                    ->join('lista_alumnos','lista_alumnos.salon_id','=','salons.id')
                    ->join('users','users.id','=','salons.docente_id')
                    ->where('lista_alumnos.alumno_id',$idusuario)
                    ->where('cursos.id',$idcurso)
                    ->where('salons.estado',true)
                    ->get(['salons.grado as salon_grado'
                    ,'salons.seccion as salon_seccion'
                    ,'salons.nivel as salon_nivel'
                    ,'cursos.id as curso_id'
                    ,'cursos.nombre as nombrecurso'
                    ,'cursos.nivel as curso_nivel'
                    ,'users.name as usuario_nombre'
                    ,'users.last_name as usuario_apellidos']);
                    
        return view('backend.evaluacion.indexAlumno', compact('evaluaciones','datos'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idcurso)
    {
        $datos = Curso::join('salons','salons.grado','=','cursos.grado')
                    ->join('users','users.id','=','salons.docente_id')
                    ->where('cursos.id',$idcurso)
                    ->where('salons.estado',true)
                    ->get(['salons.seccion as salon_seccion'
                    ,'cursos.id as curso_id'
                    ,'cursos.nombre as curso_nombre'
                    ,'cursos.nivel as curso_nivel'
                    ,'cursos.grado as curso_grado'
                    ,'users.id as usuario_id'
                    ,'users.name as usuario_nombre'
                    ,'users.last_name as usuario_apellidos']);
        
        return view('backend.evaluacion.create', compact('datos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEvaluacionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEvaluacionRequest $request)
    {
        $this->validate($request, [
            'curso_id'  =>  'required|max:250',
            'usuario_id'  =>  'required|max:250',
            'evaluacion_titulo'  =>  'required|max:250',
            'evaluacion_fecha'  =>  'required|max:12',
            'evaluacion_detalle'  =>  'required|max:250',
            'estado' => 'required|max:1'
        ]);

        $evaluacion = new Evaluacion;
        $evaluacion->curso_id = $request->curso_id;
        $evaluacion->docente_id = $request->usuario_id;
        $evaluacion->titulo = $request->evaluacion_titulo;
        $evaluacion->detalle = $request->evaluacion_detalle;
        $evaluacion->fecha = $request->evaluacion_fecha;
        $evaluacion->estado = $request->estado;

        $idusuario = $request->usuario_id;
        $idcurso = $request->curso_id;

        $evaluacion->save();    
        return redirect()->route('evaluacionIndex',[$idusuario, $idcurso]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evaluacion = Evaluacion::join('cursos','cursos.id','=','evaluacions.curso_id')
            ->join('users','users.id','=','evaluacions.docente_id')
            ->where('evaluacions.id', $id)
            ->get(['evaluacions.id as evaluacion_id',
                    'evaluacions.titulo as titulo_evaluacion',
                    'users.name as nombre_usuario',
                    'users.last_name as apellido_usuario',
                    'cursos.id as curso_id',
                    'cursos.nombre as nombre_curso'])->first();
        
        $preguntas = Pregunta::join('evaluacions', 'evaluacions.id', '=', 'preguntas.evaluacion_id')
            ->where('evaluacions.id', $id)
            ->where('preguntas.estado',true)
            ->get(['preguntas.id as pregunta_id',
                    'preguntas.detalle as nombre_pregunta',
                    'preguntas.puntaje as puntaje_pregunta']);
        
        $alternativas = Alternativa::join('preguntas', 'preguntas.id', '=', 'alternativas.pregunta_id')
            ->join('evaluacions', 'evaluacions.id', '=', 'preguntas.evaluacion_id')
            ->where('evaluacions.id', $id)
            ->where('alternativas.estado',true)
            ->get(['preguntas.id as pregunta_id',
                    'alternativas.id as alternativa_id',
                    'alternativas.detalle as nombre_alternativa']);
        return view('backend.evaluacion.examen', compact('evaluacion', 'preguntas', 'alternativas'));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = Evaluacion::join('cursos','cursos.id','=','evaluacions.curso_id')
                    ->join('users','users.id','=','evaluacions.docente_id')
                    ->join('salons','salons.docente_id','=','users.id')
                    ->where('evaluacions.id',$id)
                    ->get(['evaluacions.id as evaluacion_id'
                    ,'evaluacions.titulo as evaluacion_titulo'
                    ,'evaluacions.detalle as evaluacion_detalle'
                    ,'evaluacions.fecha as evaluacion_fecha'
                    ,'evaluacions.estado as evaluacion_estado'
                    ,'cursos.id as curso_id'
                    ,'cursos.nombre as curso_nombre'
                    ,'cursos.grado as curso_grado'
                    ,'cursos.nivel as curso_nivel'
                    ,'users.id as usuario_id'
                    ,'users.name as usuario_nombre'
                    ,'users.last_name as usuario_apellidos'
                    ,'salons.grado as salon_grado'
                    ,'salons.seccion as salon_seccion'
                    ]);
        return view('backend.evaluacion.edit', compact('datos'));             
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEvaluacionRequest  $request
     * @param  \App\Models\Evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $idusuario, $idcurso)
    {
        $evaluacion           = Evaluacion::find($id);
        $evaluacion->titulo = $request->evaluacion_titulo;
        $evaluacion->detalle = $request->evaluacion_detalle;
        $evaluacion->fecha = $request->evaluacion_fecha;
        $evaluacion->estado = $request->evaluacion_estado;
        
        $evaluacion->save();
        return redirect()->route('evaluacionIndex',[$idusuario,$idcurso]);
    }

}
