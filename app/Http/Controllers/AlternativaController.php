<?php

namespace App\Http\Controllers;

use App\Models\Alternativa;
use App\Http\Requests\StoreAlternativaRequest;
use App\Http\Requests\UpdateAlternativaRequest;

class AlternativaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreAlternativaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAlternativaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alternativa  $alternativa
     * @return \Illuminate\Http\Response
     */
    public function show(Alternativa $alternativa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alternativa  $alternativa
     * @return \Illuminate\Http\Response
     */
    public function edit(Alternativa $alternativa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAlternativaRequest  $request
     * @param  \App\Models\Alternativa  $alternativa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAlternativaRequest $request, Alternativa $alternativa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alternativa  $alternativa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alternativa $alternativa)
    {
        //
    }
}
