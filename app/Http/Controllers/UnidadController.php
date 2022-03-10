<?php

namespace App\Http\Controllers;

use App\Models\Unidad;
use App\Models\User;
use App\Models\Material;
use App\Models\Curso;
use App\Http\Requests\StoreUnidadRequest;
use App\Http\Requests\UpdateUnidadRequest;

class UnidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $unidades = Unidad::join('materials','materials.id','=','unidads.material_id')
        ->join('cursos','cursos.id','=','materials.curso_id')
        ->join('users','users.id','=','materials.docente_id')
        ->join('salons','salons.docente_id','=','users.id')
        ->where('materials.id',$id)
        ->get(['unidads.id','unidads.material_id'
        ,'unidads.nombre'
        ,'unidads.estado'
        ,'materials.titulo as material_titulo'
        ,'cursos.nombre as curso_nombre'
        ,'users.name as usuario_nombre'
        ,'users.last_name as usuario_apellidos'
        ,'salons.grado as salon_grado'
        ,'salons.seccion as salon_seccion'
        ]);

        $datosalon = Unidad::join('materials','materials.id','=','unidads.material_id')
        ->join('cursos','cursos.id','=','materials.curso_id')
        ->join('users','users.id','=','materials.docente_id')
        ->join('salons','salons.docente_id','=','users.id')
        ->where('materials.id',$id)
        ->where('salons.estado',true)
        ->get(['salons.grado as salon_grado'
        ,'salons.seccion as salon_seccion'
        ,'salons.nivel as salon_nivel'
        ,'cursos.nombre as curso_nombre'
        ,'materials.id as material_id'
        ,'materials.titulo as material_titulo'
        ]);

        return view('backend.unidad.index', compact('unidades','datosalon'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $datosalon = Unidad::join('materials','materials.id','=','unidads.material_id')
        ->join('cursos','cursos.id','=','materials.curso_id')
        ->join('users','users.id','=','materials.docente_id')
        ->join('salons','salons.docente_id','=','users.id')
        ->where('materials.id',$id)
        ->where('salons.estado',true)
        ->get(['salons.grado as salon_grado'
        ,'salons.seccion as salon_seccion'
        ,'salons.nivel as salon_nivel'
        ,'cursos.id as curso_id'
        ,'cursos.nombre as curso_nombre'
        ,'materials.id as material_id'
        ,'materials.titulo as material_titulo'
        ]);
/*
SELECT 
m.id
,m.curso_id
,m.docente_id
,m.titulo
,m.estado
,c.id AS curso_id
,c.nombre AS curso_nombre
,c.grado AS curso_grado
,c.nivel AS curso_nivel
,u.name AS usuario_nombre
,u.last_name AS usuario_apellidos
FROM materials m
INNER JOIN cursos c ON c.id = m.curso_id
INNER JOIN users u ON u.id = m.docente_id

WHERE m.id = 1;

*/
        return view('backend.unidad.create', compact('datosalon'));

       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUnidadRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUnidadRequest $request)
    {
        $this->validate($request, [
            'material_id'  =>  'required|max:250',
            'curso_id'  =>  'required|max:250',
            'docente_id'  =>  'required|max:250',
            'nombre'  =>  'required|max:250',
            'estado' => 'required|max:1'
        ]);

        $unidad = new Unidad;
        $unidad->material_id = $request->material_id;
        $unidad->nombre = $request->nombre;
        $unidad->estado = $request->estado;

        $docente = $request->docente_id;
        $curso = $request->curso_id;

        $material->save();    

        return redirect()->route('unidadlIndex',[$docente,$curso]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unidad  $unidad
     * @return \Illuminate\Http\Response
     */
    public function show(Unidad $unidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unidad  $unidad
     * @return \Illuminate\Http\Response
     */
    public function edit(Unidad $unidad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUnidadRequest  $request
     * @param  \App\Models\Unidad  $unidad
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUnidadRequest $request, Unidad $unidad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unidad  $unidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unidad $unidad)
    {
        //
    }
}
