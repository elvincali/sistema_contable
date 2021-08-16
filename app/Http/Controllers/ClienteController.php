<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cliente;
use App\User;
use App\Bitacora;
use DB;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    public function index(){
        $clientes = Cliente::join('users', 'clientes.user_id', 'users.id')
                            ->select('users.*', 'clientes.*')
                            ->get();

        return view('cliente.index', compact('clientes'));
    }

    public function create(){
        return view('cliente.create');
    }

    public function store(Request $request){
        $request->validate([
            'ci' => 'required',
            'nombre' => 'required',
            'apellido_pat' => 'required',
            'apellido_mat' => 'required',
            'fecha_nac' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
        ]);

        try {
            DB::transaction(function() use ($request) {
                $ruta = $request->file('imagen')->store('public');
                    
                $user = User::create([
                    'foto' => $ruta,
                    'ci' => $request->ci,
                    'codigo' => random_int(1000, 9999),
                    'nombre' => strtoupper($request->nombre),
                    'apellido_pat' => strtoupper($request->apellido_pat),
                    'apellido_mat' => strtoupper($request->apellido_mat),
                    'fecha_nac' => $request->fecha_nac,
                    'telefono' => $request->telefono,
                    'direccion' => $request->direccion,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);
                $cliente = Cliente::create([
                    'user_id' => $user->id,
                    'genero' => $request->genero,
                    'nacionalidad' => $request->nacionalidad,
                    'estado_civ' => $request->estado_civ,
                    'ocupacion' => $request->ocupacion,
                ]);
                $user->assignRole('cliente');
                
                Bitacora::register(
                    'crear', 'se ha creado el cliente ' . $user->id, \Request::ip()
                );
            });
        } catch (\Exception $e) {
            return $e;
        }
        return redirect()->route('clientes.index')->with(['message' => 'Cliente guardado exitosamente']);
    }

    public function edit($id){
        $cliente = Cliente::join('users', 'clientes.user_id', 'users.id')
                            ->where('users.id', $id)
                            ->select('users.*', 'clientes.*')
                            ->first();
        Bitacora::register(
            'editar', 'se ha editado el cliente ' . $id, \Request::ip()
        );

        return view('cliente.edit', compact('cliente'));                    
    }

    public function update(Request $request, $id){
        try {
            DB::transaction(function() use ($request, $id) {
                $user = User::findOrFail($id);  
                if ($request->hasFile('imagen')) {
                    $ruta = $request->file('imagen')->store('public');
                    $user->foto = $ruta;
                }
                $user->ci = $request->ci;
                $user->nombre = $request->nombre;
                $user->apellido_pat = $request->apellido_pat;
                $user->apellido_mat = $request->apellido_mat;
                $user->fecha_nac = $request->fecha_nac;
                $user->telefono = $request->telefono;
                $user->direccion = $request->direccion;
                $user->password = Hash::make($request->password);
                $user->save();

                Cliente::where('user_id', $id)
                                ->update([
                                    'genero' => $request->genero,
                                    'nacionalidad' => $request->nacionalidad,
                                    'estado_civ' => $request->estado_civ,
                                    'ocupacion' => $request->ocupacion,
                                ]);

                Bitacora::register(
                    'actualizar', 'se ha actualizado el cliente ' . $id, \Request::ip()
                );
            });
        } catch (\Exception $e) {
            return response()->json($e);
        }
        return redirect()->route('clientes.index')->with(['message' => 'actualizado correctamente']);
    }

    public function show($id){

    }
}
