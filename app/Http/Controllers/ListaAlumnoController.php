<?php

namespace App\Http\Controllers;

use App\Models\ListaAlumno;
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
        $listaAlumnos = ListaAlumno::join('salons', 'salons.id', '=', 'lista_alumnos.salon_id')->join('users', 'users.id', '=', 'lista_alumnos.alumno_id')->where('lista_alumnos.salon_id', $id_salon)->get(['lista_alumnos.id', 'users.dni', 'users.name', 'users.last_name', 'users.estado', 'lista_alumnos.created_at']);
        
        return view('backend.listaAlumno.index', compact('listaAlumnos'));
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
     * @param  \App\Http\Requests\StoreListaAlumnoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreListaAlumnoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ListaAlumno  $listaAlumno
     * @return \Illuminate\Http\Response
     */
    public function show(ListaAlumno $listaAlumno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ListaAlumno  $listaAlumno
     * @return \Illuminate\Http\Response
     */
    public function edit(ListaAlumno $listaAlumno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateListaAlumnoRequest  $request
     * @param  \App\Models\ListaAlumno  $listaAlumno
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateListaAlumnoRequest $request, ListaAlumno $listaAlumno)
    {
        //
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
