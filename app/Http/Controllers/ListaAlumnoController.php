<?php

namespace App\Http\Controllers;

use App\Models\ListaAlumno;
use App\Models\User;
use App\Models\Salon;
use App\Http\Requests\StoreListaAlumnoRequest;
use App\Http\Requests\UpdateListaAlumnoRequest;

class ListaAlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_salon)
    {
        $listaAlumnos = ListaAlumno::join('salons', 'salons.id', '=', 'lista_alumnos.salon_id')->join('users', 'users.id', '=', 'lista_alumnos.alumno_id')->where('lista_alumnos.salon_id', $id_salon)->get(['lista_alumnos.id', 'users.dni', 'users.name', 'users.last_name', 'lista_alumnos.estado as estado', 'lista_alumnos.created_at']);
        $salon= Salon::join('users', 'users.id', '=', 'salons.docente_id')->where('salons.id',$id_salon)->get(['salons.id as salon_id', 'salons.grado as grado', 'salons.seccion as seccion', 'salons.nivel as nivel', 'users.name as docente_nombre', 'users.last_name as docente_apellido'])->first();

        return view('backend.listaAlumno.index', compact('listaAlumnos','salon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_salon)
    {
        $listaAlumnos = ListaAlumno::join('salons', 'salons.id', '=', 'lista_alumnos.salon_id')->join('users', 'users.id', '=', 'lista_alumnos.alumno_id')->where('lista_alumnos.salon_id', $id_salon)->get(['lista_alumnos.id', 'users.dni', 'users.name', 'users.last_name', 'lista_alumnos.estado as estado', 'lista_alumnos.created_at']);
        $alumnosRegistrados= ListaAlumno::get('alumno_id')->where('estado', 1);
        $alumnos = json_encode(User::whereRoleIs('alumno')->whereNotIn('id', $alumnosRegistrados)->get());
        $salon= Salon::join('users', 'users.id', '=', 'salons.docente_id')->where('salons.id',$id_salon)->get(['salons.id as salon_id', 'salons.grado as grado', 'salons.seccion as seccion', 'salons.nivel as nivel', 'users.name as docente_nombre', 'users.last_name as docente_apellido'])->first();
        return view('backend.listaAlumno.create', compact('alumnos', 'salon', 'listaAlumnos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreListaAlumnoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreListaAlumnoRequest $request)
    {
        $salon_id = $request->salon_id;
        $listaAlumno = new ListaAlumno;
        $listaAlumno->salon_id = $salon_id;
        $listaAlumno->alumno_id = $request->alumno_id;
        $listaAlumno->estado = $request->estado;
        $listaAlumno->save();
        return redirect()->route('listaAlumnoIndex', $salon_id)->with('success', 'Lista de alumno creado exitoso');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ListaAlumno  $listaAlumno
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listaAlumno = ListaAlumno::join('users', 'users.id', '=', 'lista_alumnos.alumno_id')->where('lista_alumnos.id', $id)->get(['lista_alumnos.id','users.id as user_id', 'lista_alumnos.salon_id as salon_id', 'users.dni', 'users.name', 'users.last_name', 'lista_alumnos.estado as estado', 'lista_alumnos.created_at'])->first();
        $alumnosRegistrados= ListaAlumno::get('alumno_id')->where('estado', 1);
        $alumnos = json_encode(User::whereRoleIs('alumno')->whereNotIn('id', $alumnosRegistrados)->get());
        $salon= Salon::join('users', 'users.id', '=', 'salons.docente_id')->where('salons.id',$listaAlumno->salon_id)->get(['salons.id as salon_id', 'salons.grado as grado', 'salons.seccion as seccion', 'salons.nivel as nivel', 'users.name as docente_nombre', 'users.last_name as docente_apellido'])->first();
        return view('backend.listaAlumno.edit', compact('alumnos', 'salon', 'listaAlumno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateListaAlumnoRequest  $request
     * @param  \App\Models\ListaAlumno  $listaAlumno
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateListaAlumnoRequest $request, $id)
    {
        $salon_id = $request->salon_id;
        $listaAlumno = ListaAlumno::find($id);
        $listaAlumno->salon_id = $salon_id;
        $listaAlumno->alumno_id = $request->alumno_id;
        $listaAlumno->estado = $request->estado;
        $listaAlumno->save();
        return redirect()->route('listaAlumnoIndex', $salon_id)->with('success', 'Lista de alumno creado exitoso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ListaAlumno  $listaAlumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(ListaAlumno $listaAlumno)
    {
        //
    }
}
