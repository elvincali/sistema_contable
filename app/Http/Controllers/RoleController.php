<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function permisos(){
        $permisos = Permission::all();
        return view('role.permiso', compact('permisos'));
    }

    public function index(){
        $roles = Role::all();
        return view('role.index', compact('roles'));
    }

    public function create(){
        $permisos = Permission::all();
        return view('role.create', compact('permisos'));
    }

    public function store(Request $request){
        $rol = Role::create(['name' => $request->nombre, 'guard_name' => $request->descripcion]);
        $rol->syncPermissions($request->permisos);
        return redirect('roles')->with(['message' => 'el Rol '.$request->nombre.' se ha creado correctamente']);
    }

    public function show($id){
        $permiso = Permission::findOrFail($id)->pluck('name');
        dd($permiso);
    }

    public function edit($id){
        $rol = Role::findOrFail($id);
        $permisos = Permission::all();
        return view('role.edit', compact('permisos', 'rol'));
    }

    public function update(Request $request, $id){
        // dd($request);
        $rol = Role::findOrFail($id);
        $rol->permissions()->detach();  // Elimina todos los permisos del rol
        $rol->name = $request->nombre;
        $rol->guard_name = $request->descripcion;
        $rol->syncPermissions($request->permisos);
        $rol->save();

        return redirect(route('roles.index'))->with(['message' => 'El rol se ha actualizado correctamente']);
    }
}
