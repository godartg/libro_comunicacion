<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Salon;
use App\Models\Role;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('backend.usuario.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('backend.usuario.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  =>  'required|max:255',
            'email' =>  'required|email|unique:users',
            'last_name' => 'required|max:255',
            'dni' => 'required|max:8',
            'sexo' => 'required'
        ]);
        if(!empty($request->password)){
            $password = trim($request->password); 
        }else{
            $password = 'contrasenanueva';
        }

        $user = new User;
        $user->name     = $request->name;
        $user->last_name = $request->last_name;
        $user->email    = $request->email;
        $user->dni      = $request->dni;
        $user->estado     = $request->estado;
        $user->sexo     = $request->sexo;
        $user->fecha_nacimiento =   $request->fecha_nacimiento;
        $user->password = Hash::make($password);
        $rolesSelected  =  $request->rolesSelected;
        $user->save();
        $user->syncRoles($rolesSelected);
        return redirect()->route('usuarioIndex');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('backend.usuario.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user   = User::find($id);
        $user->name     = $request->name;
        $user->last_name = $request->last_name;
        $user->email    = $request->email;
        $user->dni      = $request->dni;
        $user->estado     = $request->estado;
        $user->sexo     = $request->sexo;
        $user->fecha_nacimiento =   $request->fecha_nacimiento;
        
        $user->save();
        $user->syncRoles($request->rolesSelected);
        
        return redirect()->route('usuarioIndex');
    }
    public function obtenerDocentesFiltrado($grado, $seccion ){
        $docente= Salon::join('users','users.id','=','salons.docente_id')
        ->where('salons.grado', $grado)
        ->where('salons.seccion', $seccion)
        ->get(['users.name', 'users.last_name']);
        return $docente;
        return \response($docente);
    }

}
