<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use DB;

use App\Transaccion;
use App\Cuenta;
use App\Bitacora;

class DepositoController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view('transaccion.deposito.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ci' => 'required',
            'nombre' => 'required',
            'monto' => 'required',
        ]);
        try {
            DB::transaction(function() use ($request) {
                $dato = Carbon::now();
                $cuenta = Cuenta::where('num_cuenta', $request->num_cuenta)->first();
                Transaccion::create([
                    'monto' => $request->monto,
                    'fecha' => $dato->toDateString(),
                    'hora' => $dato->toTimeString(),
                    'ci_cliente' => $request->ci,
                    'nombre_cliente' => strtoupper($request->nombre .' '. $request->apellido_pat .' '. $request->apellido_mat) ,
                    'tipo' => 'DEPOSITO',
                    'cod_funcionario' => Auth::user()->codigo,
                    'descripcion' => 'Deposito en caja de ahorro',
                    'num_cuenta_id' => $cuenta->id
                ]);

                $cuenta->update([
                    'saldo' => $cuenta->saldo + $request->monto
                ]);

                Bitacora::register(
                    'crear', 'se ha creado la deposito del numero de cuenta' . $request->num_cuenta, \Request::ip()
                );
            });
        } catch (\Exception $e) {
            return $e;
        }
        return redirect()->route('transacciones.index')->with(['message' => 'se ha realizado el Deposito con exito']);


    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

}
