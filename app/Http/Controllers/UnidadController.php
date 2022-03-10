<?php

namespace App\Http\Controllers;

use App\Models\Unidad;
use App\Models\Material;
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
        ,'salons.grado as ssalon_grado'
        ,'salons.seccion as ssalon_seccion'
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
        ,'materials.titulo as material_titulo'
        ]);

        return view('backend.unidad.index', compact('unidades','datosalon'));


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
     * @param  \App\Http\Requests\StoreUnidadRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUnidadRequest $request)
    {
        //
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
