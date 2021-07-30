<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cliente;
use App\User;
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

                $nombre_imagen = $request->file('imagen')->getClientOriginalName();
                    
                $user = User::create([
                    'foto' => $nombre_imagen,
                    'ci' => $request->ci,
                    'codigo' => random_int(1000, 9999),
                    'nombre' => $request->nombre,
                    'apellido_pat' => $request->apellido_pat,
                    'apellido_mat' => $request->apellido_mat,
                    'fecha_nac' => $request->fecha_nac,
                    'telefono' => $request->telefono,
                    'direccion' => $request->direccion,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);
                $id = DB::getPdo()->lastInsertId();
                $cliente = Cliente::create([
                    'user_id' => $id,
                    'genero' => $request->genero,
                    'nacionalidad' => $request->nacionalidad,
                    'estado_civ' => $request->estado_civ,
                    'ocupacion' => $request->ocupacion,
                ]);
                $user->assignRole('cliente');
                $request->file('imagen')->move('img/cliente', $nombre_imagen);  
            });
        } catch (\Exception $e) {
            return back();
        }
            return redirect('clientes')->with(['message' => 'Cliente guardado exitosamente']);
    }

    public function edit($id){
        $cliente = Cliente::join('users', 'clientes.user_id', 'users.id')
                            ->where('users.id', $id)
                            ->select('users.*', 'clientes.*')
                            ->first();
        return view('cliente.edit', compact('cliente'));                    
    }

    public function update(Request $request, $id){
        try {
            DB::transaction(function() use ($request, $id) {
                $nombre_imagen = $request->file('imagen')->getClientOriginalName();
                $user = User::findOrFail($id);  
                $user->foto = $nombre_imagen;
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

                $request->file('imagen')->move('img/cliente', $nombre_imagen);  
            });
        } catch (\Exception $e) {
            return response()->json($e);
        }
        return redirect('clientes')->with(['message' => 'actualizado correctamente']);
    }

    public function show($id){

    }
}
