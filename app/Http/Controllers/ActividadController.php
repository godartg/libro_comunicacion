<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
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
        $this->validate($request, [
            'unidad_id'  =>  'required|max:250',
            'actividad_detalle'  =>  'required|max:250',
            'actividad_pagina'  =>  'required|max:250',
            'actividad_ayuda'  =>  'required|max:250',
            'estado' => 'required|max:1'
        ]);

        $actividad = new Actividad;
        $actividad->unidad_id = $request->unidad_id;
        $actividad->detalle = $request->actividad_detalle;
        $actividad->pagina = $request->actividad_pagina;
        $actividad->ayuda = $request->actividad_ayuda;
        $actividad->estado = $request->estado;

        $idunidad = $request->unidad_id;

        $actividad->save();  

        return redirect()->route('actividadIndex',$idunidad);
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
    public function edit($id)
    {
        $actividad = Actividad::join('unidads','unidads.id','=','actividads.unidad_id')
        ->join('materials','materials.id','=','unidads.material_id')
        ->join('users','users.id','=','materials.docente_id')
        ->join('cursos','cursos.id','=','materials.curso_id')
        ->where('actividads.id',$id)
        ->get([
        'actividads.id as actividad_id'
        ,'actividads.detalle as actividad_detalle'
        ,'actividads.ayuda as actividad_ayuda'
        ,'actividads.pagina as actividad_pagina'
        ,'actividads.estado as actividad_estado'
        ,'unidads.id as unidad_id'
        ,'unidads.nombre as unidad_nombre'
        ,'materials.titulo as material_titulo'
        ,'users.name as usuario_nombre'
        ,'users.name as usuario_apellidos'
        ,'cursos.nombre as curso_nombre'
        ,'cursos.grado as curso_grado'
        ,'cursos.nivel as curso_nivel'
        ]);
        return view('backend.actividad.edit', compact('actividad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateActividadRequest  $request
     * @param  \App\Models\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $idunidad)
    {
        $actividad           = Actividad::find($id);
        $actividad->detalle   = $request->actividad_detalle;
        $actividad->ayuda   = $request->actividad_ayuda;
        $actividad->pagina   = $request->actividad_pagina;
        $actividad->estado   = $request->estado;
        
        $actividad->save();
        return redirect()->route('actividadIndex',$idunidad);
    }


    public function obtenerDescripcion(){
        $actividadDetalles= Actividad::where('estado', 1)->get('detalle');
        return \response($actividadDetalles);
    }
    public function obtenerAyudas(){
        $actividadAyudas= Actividad::where('estado', 1)->get('ayuda');
        return \response($actividadAyudas);
    }

    public function obtenerDescripcionFiltrado($grado, $seccion, $curso, $material, $pagina, $numero ){
        $actividadesDetalles= Actividad::where('estado', 1)->where('pagina', $pagina)->where('numero', $numero)->get('detalle');
        return \response($actividadesDetalles);
    }
    public function obtenerAyudaFiltrado($grado, $seccion, $curso, $material, $pagina, $numero ){
        $actividadesDetalles= Actividad::where('estado', 1)->where('pagina', $pagina)->where('numero', $numero)->get('ayuda');
        return \response($actividadesDetalles);
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
