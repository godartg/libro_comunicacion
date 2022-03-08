<?php

namespace App\Http\Controllers;

use App\Models\Salon;
use App\Http\Requests\StoreSalonRequest;
use App\Http\Requests\UpdateSalonRequest;

class SalonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salons = Salon::join('users', 'users.id', '=', 'salons.docente_id')->get(['salons.id','salons.docente_id','users.name', 'users.last_name', 'salons.grado', 'salons.seccion', 'salons.nivel', 'salons.fecha_creacion', 'salons.estado', 'salons.created_at']);
        return view('backend.salon.index', compact('salons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.salon.create', compact('salons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSalonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSalonRequest $request)
    {
        $salon = new Salon;
        $salon->docente_id = $request->docente_id;
        $salon->grado = $request->grado;
        $salon->seccion = $request->seccion;
        $salon->fecha_creacion = $request->fecha_creacion;
        $salon->estado     = $request->estado;
        return redirect()->route('salonIndex');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Salon  $salon
     * @return \Illuminate\Http\Response
     */
    public function edit(Salon $salon)
    {
        return view('backend.salon.edit', compact('salon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSalonRequest  $request
     * @param  \App\Models\Salon  $salon
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSalonRequest $request, Salon $salon)
    {
        $salon->docente_id = $request->docente_id;
        $salon->grado = $request->grado;
        $salon->seccion = $request->seccion;
        $salon->fecha_creacion = $request->fecha_creacion;
        $salon->estado = $request->estado;
        return redirect()->route('salonIndex');
    }

}
