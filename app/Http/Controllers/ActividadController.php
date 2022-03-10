<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Http\Requests\StoreActividadRequest;
use App\Http\Requests\UpdateActividadRequest;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $actividades = Actividad::join('unidads','unidads.id','=','actividads.unidad_id')
        ->join('materials','materials.id','=','unidads.material_id')
        ->join('users','users.id','=','materials.docente_id')
        ->join('cursos','cursos.id','=','materials.curso_id')
        ->where('actividads.unidad_id',$id)
        ->get([
        'actividads.id as actividad_id'
        ,'actividads.detalle as actividad_detalle'
        ,'actividads.estado as actividad_estado'
        ,'unidads.nombre as unidad_nombre'
        ,'materials.titulo as material_titulo'
        ,'users.name as usuario_nombre'
        ,'cursos.nombre as curso_nombre'
        ]);
        return view('backend.actividad.index', compact('actividades'));
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
     * @param  \App\Http\Requests\StoreActividadRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreActividadRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function show(Actividad $actividad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function edit(Actividad $actividad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateActividadRequest  $request
     * @param  \App\Models\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateActividadRequest $request, Actividad $actividad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Actividad $actividad)
    {
        //
    }
}
