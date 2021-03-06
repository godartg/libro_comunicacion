<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Salon;
use App\Http\Requests\StoreCursoRequest;
use App\Http\Requests\UpdateCursoRequest;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Curso::all();
        return view('backend.curso.index', compact('cursos'));
    }

    public function cursoDocenteLista($usu)
    {
        $cursos = Curso::join('salons','salons.grado','=','cursos.grado')
                    ->join('users','users.id','=','salons.docente_id')
                    ->where('users.id',$usu)
                    ->where('salons.estado',true)
                    ->where('cursos.estado',true)
                    ->get(['cursos.id','cursos.nombre','cursos.grado','cursos.nivel','cursos.estado','salons.estado as estado_salon']);
        
        $salon = Curso::join('salons','salons.grado','=','cursos.grado')
                    ->join('users','users.id','=','salons.docente_id')
                    ->where('users.id',$usu)
                    ->where('salons.estado',true)
                    ->get(['salons.grado','salons.seccion','salons.nivel']);
     
        if ($salon === null) {
            $salon = ["grado"=>"","seccion"=>"","nivel"=>""];
        }
        return view('backend.curso.cursodocentelista', compact('cursos','salon'));

    }

    public function cursoAlumnoLista($usu){
        $cursos = Curso::join('salons','salons.grado','=','cursos.grado')
        ->join('lista_alumnos','lista_alumnos.salon_id','=','salons.id')
        ->join('users','users.id','=','lista_alumnos.alumno_id')
        ->where('users.id',$usu)
        ->where('salons.estado',true)
        ->where('cursos.estado',true)
        ->get(['cursos.id','cursos.nombre','cursos.grado','cursos.nivel','cursos.estado','salons.estado as estado_salon']);

        $salon = Curso::join('salons','salons.grado','=','cursos.grado')
            ->join('users','users.id','=','salons.docente_id')
            ->join('lista_alumnos','lista_alumnos.salon_id','=','salons.id')
            ->where('lista_alumnos.alumno_id',$usu)
            ->where('salons.estado',true)
            ->get(['salons.grado','salons.seccion','salons.nivel', 'lista_alumnos.alumno_id']);
        return view('backend.curso.cursoalumnolista', compact('cursos','salon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.curso.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCursoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCursoRequest $request)
    {
        $curso = new Curso;
        $curso->nombre = $request->nombre;
        $curso->grado = $request->grado;
        $curso->nivel = $request->nivel;
        $curso->estado = $request->estado;
        $curso->save();
        return redirect()->route('cursoIndex')->with('success', 'Curso creado exitoso');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit(Curso $curso)
    {
        return view('backend.curso.edit', compact('curso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCursoRequest  $request
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCursoRequest $request, Curso $curso)
    {
        $curso->nombre = $request->nombre;
        $curso->grado = $request->grado;
        $curso->nivel = $request->nivel;
        $curso->estado = $request->estado;
        $curso->save();
        return redirect()->route('cursoIndex')->with('success', 'Curso updated successfully');
    }
}
