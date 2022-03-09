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
                    ->get(['cursos.id','cursos.nombre','cursos.grado','cursos.nivel','cursos.estado']);
        return view('backend.curso.cursodocentelista', compact('cursos'));

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
        Curso::create($request->all());
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
        $curso->update($request->all());
        return redirect()->route('cursoIndex')->with('success', 'Curso updated successfully');
    }
}
