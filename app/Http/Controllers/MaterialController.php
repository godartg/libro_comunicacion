<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Curso;
use App\Models\Material;
use App\Http\Requests\StoreMaterialRequest;
use App\Http\Requests\UpdateMaterialRequest;



class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index($docente, $curso)
    {
        $materiales = Material::join('cursos','cursos.id','=','materials.curso_id')
                    ->join('users','users.id','=','materials.docente_id')
                    ->where('users.id',$docente)
                    ->where('cursos.id',$curso)
                    ->get(['materials.id','materials.curso_id','materials.titulo','materials.estado']);

        $salon = Curso::join('salons','salons.grado','=','cursos.grado')
                    ->join('users','users.id','=','salons.docente_id')
                    ->where('users.id',$docente)
                    ->where('cursos.id',$curso)
                    ->where('salons.estado',true)
                    ->get(['salons.grado','salons.seccion','salons.nivel','cursos.id as curso_id','cursos.nombre as nombrecurso','users.name as usuario_nombre']);

        return view('backend.material.index', compact('materiales','salon'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $curso = Curso::find($id);
        return view('backend.material.create', compact('curso'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMaterialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'curso_id'  =>  'required|max:250',
            'docente_id'  =>  'required|max:250',
            'titulo'  =>  'required|max:250',
            'estado' => 'required|max:1'
        ]);

        $material = new Material;
        $material->curso_id = $request->curso_id;
        $material->docente_id = $request->docente_id;
        $material->titulo = $request->titulo;
        $material->estado = $request->estado;

        $docente = $request->docente_id;
        $curso = $request->curso_id;

        $material->save();    

        return redirect()->route('materialIndex',[$docente,$curso]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $material = Material::find($id);
        return view('backend.material.edit', compact('material'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMaterialRequest  $request
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $docente, $curso)
    {
        $material           = Material::find($id);
        $material->titulo   = $request->titulo;
        $material->estado   = $request->estado;
        
        $material->save();
        return redirect()->route('materialIndex',[$docente,$curso]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Material $material)
    {
        //
    }
}
