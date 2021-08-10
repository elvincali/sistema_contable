<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $funcionarios = User::with('roles')->get();
        // $funcionarios = User::doesntHave('roles')->get();
        // return $funcionarios;

        return view('funcionario.index', compact('funcionarios'));
    }

    public function create(Request $request)
    {
        $roles = Role::all();
        
        return view('funcionario.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $funcionario = new User();
        $funcionario->nombre = $request->nombre;

        $ruta = $request->file('imagen')->store('public');
        $funcionario->foto = $ruta;

        $funcionario->nombre = $request->nombre;
        $funcionario->apellido_pat = $request->apellido_pat;
        $funcionario->apellido_mat = $request->apellido_mat;
        $funcionario->fecha_nac = $request->fecha_nac;
        $funcionario->telefono = $request->telefono;
        $funcionario->direccion = $request->direccion;
        $funcionario->email = $request->email;
        $funcionario->password = Hash::make($request->password);

        $funcionario->save();

        $funcionario->assignRole($request->rol);

        return redirect('/funcionarios')->with(['message' => 'el Funcionario se creo exitosamente']);

    }

    public function show($id)
    {
        $funcionario = User::find($id);

        return view('funcionario.show', compact('funcionario'));
    }

    public function edit($id){
        $funcionario = User::find($id);
        $funcionario::with('roles')->get();

        $roles = Role::all();

        return view('funcionario.edit', compact('funcionario', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $funcionario = User::findOrFail($id);
        $rol_actual = $funcionario::with('roles')->first();
        // return $funcionario->nombre;
        if ($request->hasFile('imagen')) {
            $ruta = $request->file('imagen')->store('public');
            $funcionario->foto = $ruta;
        }

        $funcionario->nombre = $request->nombre;
        $funcionario->apellido_pat = $request->apellido_pat;
        $funcionario->apellido_mat = $request->apellido_mat;
        $funcionario->fecha_nac = $request->fecha_nac;
        $funcionario->telefono = $request->telefono;
        $funcionario->direccion = $request->direccion;
        $funcionario->email = $request->email;

        $funcionario->save();

        $funcionario->removeRole($rol_actual->roles[0]->name);

        $funcionario->assignRole($request->rol);

        return redirect('funcionarios')->with(['message', 'El funcionacio a sido actualizado con exito']);
    }

    public function destroy($id)
    {
        //
    }
}
