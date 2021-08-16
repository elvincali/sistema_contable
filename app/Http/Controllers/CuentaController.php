<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Rules\MontoAperturaMinima;

use App\Cuenta;
use App\User;
use App\Cliente;
use App\TipoCuenta;
use App\Sucursal;
use App\Bitacora;

class CuentaController extends Controller
{
    public function index(){
        $cuentas = Cuenta::join('users', 'cliente_id', 'users.id')
                        ->join('tipo_cuentas', 'tipo_cuenta_id', 'tipo_cuentas.id')
                        ->select('cuentas.*', 'users.nombre as nombre', 'users.apellido_pat as apellido', 'tipo_cuentas.nombre as tipo_cuenta')
                        ->get();

        return view('cuenta.index', compact('cuentas'));
    }

    public function create(){
        $tipo_cuentas = TipoCuenta::all();
        $clientes = User::all();
        $sucursales = Sucursal::all();

        return view('cuenta.create', compact('tipo_cuentas', 'clientes', 'sucursales'));
    }    

    public function store(Request $request){
        $request->validate([
            'saldo' => ['bail', 'required', new MontoAperturaMinima($request->tipo_cuenta_id)],
        ],[
            'saldo.required' => 'debe ingresar un valor',
        ]);

        $sucursal = Sucursal::find($request->sucursal_id);
        $tipo_cuenta = TipoCuenta::find($request->tipo_cuenta_id);

        Cuenta::create([
            'cliente_id' => $request->cliente_id,
            'tipo_cuenta_id' => $request->tipo_cuenta_id,
            'fecha_apertura' => Carbon::now(),
            'saldo' => $request->saldo,
            'retiros_mes' => 0,
            'num_cuenta' => 1000 . $sucursal->codigo . rand(10, 99) . rand(1000000, 9999999)
        ]);

        Bitacora::register(
            'crear', 'se ha creado la cuenta del cliente' . $request->cliente_id, \Request::ip()
        );

        return redirect()->route('cuentas.index')->with(['message' => 'guardado exitosamente']);
    }    

    public function edit($id){
        
    }  

    public function update(Request $request, $id){
    
    }    

    public function show($id){
    
    }    
}
