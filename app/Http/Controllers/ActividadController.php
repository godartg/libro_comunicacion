<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\Unidad;
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
        ,'actividads.ayuda as actividad_ayuda'
        ,'actividads.pagina as actividad_pagina'
        ,'actividads.estado as actividad_estado'
        ,'unidads.nombre as unidad_nombre'
        ,'materials.titulo as material_titulo'
        ,'users.name as usuario_nombre'
        ,'users.name as usuario_apellidos'
        ,'cursos.nombre as curso_nombre'
        ]);

        $datos = Unidad::join('materials','materials.id','=','unidads.material_id')
        ->join('cursos','cursos.id','=','materials.curso_id')
        ->join('users','users.id','=','materials.docente_id')
        ->join('salons','salons.docente_id','=','users.id')
        ->where('unidads.id',$id)
        ->get([
        'salons.grado as salon_grado'
        ,'salons.seccion as salon_seccion'
        ,'cursos.nivel as curso_nivel'
        ,'cursos.nombre as curso_nombre'
        ,'materials.titulo as material_titulo'
        ,'unidads.nombre as unidad_nombre'
        ,'unidads.id as unidad_id'
        ]);

        return view('backend.actividad.index', compact('actividades','datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $datos = Unidad::join('materials','materials.id','=','unidads.material_id')
        ->join('cursos','cursos.id','=','materials.curso_id')
        ->join('users','users.id','=','materials.docente_id')
        ->join('salons','salons.docente_id','=','users.id')
        ->where('unidads.id',$id)
        ->get([
        'salons.grado as salon_grado'
        ,'salons.seccion as salon_seccion'
        ,'cursos.nivel as curso_nivel'
        ,'cursos.nombre as curso_nombre'
        ,'materials.titulo as material_titulo'
        ,'unidads.id as unidad_id'
        ,'unidads.nombre as unidad_nombre'
        ,'users.name as usuario_nombre'
        ,'users.last_name as usuario_apellidos'
        ]);
        return view('backend.actividad.create', compact('datos'));

       
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
