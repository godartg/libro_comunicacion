<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Curso;
use App\Models\Material;
use App\Http\Requests\StoreMaterialRequest;
use App\Http\Requests\UpdateMaterialRequest;



class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materiales = Material::all();
        return view('backend.material.index', compact('materiales'));

        /*$materiales = Material::where('curso_id',"=", $idcurso)->where('docente_id',"=", $iddocente);
        return view('backend.material.index', compact('materiales'));*/


        /*$materiales = Curso::find($id)->curso;
        return view('backend.material.index', compact('materiales'));*/

        /*$materiales = \BD::table('users')
                    ->select('user.*')
                    ->orderBy('id','DESC')
                    ->get();
        return view('materiales')->with('usuarios',$usuarios);
        return view('backend.material.index', compact('users'));
        */
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
     * @param  \App\Http\Requests\StoreMaterialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'titutlo'  =>  'required|max:250',
            'estado' => 'required|max:1'
        ]);

        $material = new Material;
        $material->titulo = $request->titulo;
        $material->estado = $request->estado;
        $material->save();       
        return redirect()->route('materialIndex');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $material = Material::find($id);
        return view('backend.material.edit', compact('material'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMaterialRequest  $request
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $material           = Material::find($id);
        $material->titulo   = $request->titulo;
        $material->estado   = $request->estado;
        
        $material->save();
        return redirect()->route('materialIndex','1');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Material $material)
    {
        //
    }
}
