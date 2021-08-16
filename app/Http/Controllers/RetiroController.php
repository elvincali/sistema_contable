<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\MontoAceptado;
use App\Rules\MontoPermitido;
use App\Rules\RetirosPermitidos;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use DB;

use App\Transaccion;
use App\Cuenta;
use App\Bitacora;

class RetiroController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view('transaccion.retiro.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'monto' => ['bail', new MontoAceptado($request->num_cuenta), new MontoPermitido($request->num_cuenta)],
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
                    'tipo' => 'RETIRO',
                    'cod_funcionario' => Auth::user()->codigo,
                    'descripcion' => 'Retiro en caja de ahorro',
                    'num_cuenta_id' => $cuenta->id
                ]);

                $cuenta->update([
                    'saldo' => $cuenta->saldo - $request->monto,
                    'retiros_mes' => $cuenta->retiros_mes + 1
                ]);
                Bitacora::register(
                    'crear', 'se ha creado el retiro de la cuenta ' . $request->cliente_id, \Request::ip()
                );
            });
        } catch (\Exception $e) {
            return 'fallo';
        }
        return redirect()->route('transacciones.index')->with(['message' => 'se ha realizado el Retiro con exito']);
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
