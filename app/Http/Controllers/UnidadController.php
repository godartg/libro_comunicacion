<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
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

        $datosalon = Material::join('cursos','cursos.id','=','materials.curso_id')
                    ->join('users','users.id','=','materials.docente_id')
                    ->join('salons','salons.docente_id','=','users.id')
                    ->where('materials.id',$id)
                    ->get([
                        'salons.grado as salon_grado'
                        ,'salons.seccion as salon_seccion'
                        ,'salons.nivel as salon_nivel'
                        ,'cursos.nombre as curso_nombre'
                        ,'materials.titulo as material_titulo'
                        ,'materials.id as material_id'
                        ,'users.name as usuario_nombre']);

        return view('backend.unidad.index', compact('unidades','datosalon'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $datosmaterial = Material::join('cursos','cursos.id','=','materials.curso_id')
        ->join('users','users.id','=','materials.docente_id')
        ->where('materials.id',$id)
        ->get([
        'materials.id'
        ,'materials.curso_id'
        ,'materials.docente_id'
        ,'materials.titulo'
        ,'materials.estado'
        ,'cursos.nombre as curso_nombre'
        ,'cursos.grado as curso_grado'
        ,'cursos.nivel as curso_nivel'
        ,'users.name as usuario_nombre'
        ,'users.last_name as usuario_apellidos'
        ]);
        return view('backend.unidad.create', compact('datosmaterial'));

       
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
            'nombre'  =>  'required|max:250',
            'estado' => 'required|max:1'
        ]);

        $unidad = new Unidad;
        $unidad->material_id = $request->material_id;
        $unidad->nombre = $request->nombre;
        $unidad->estado = $request->estado;

        $idmaterial = $request->material_id;

        $unidad->save();    
        return redirect()->route('unidadlIndex',$idmaterial);
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
