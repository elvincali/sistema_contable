<?php

namespace App\Http\Controllers\Api;

use App\Bitacora;
use App\Cliente;
use App\Cuenta;
use App\Http\Controllers\Controller;
use App\Transaccion;
use App\User;
use App\Util\BaseResponse;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

final class TransferController extends Controller
{
    public function index(Request $request)
    {
        return DB::table('transaccions as t')
            ->join('cuentas as co', 'co.id', '=', 't.num_cuenta_id')
            ->join('cuentas as cd', 'cd.id', '=', 't.num_cuenta_destino')
            ->select('t.id', 't.fecha', 't.monto', 'co.num_cuenta as cuenta_origen', 'cd.num_cuenta as cuenta_destino')
            ->where('t.cod_funcionario', Auth::user()->codigo)
            ->orderBy('t.id', 'desc')
            ->get();
    }

    public function create()
    {
        $response = new BaseResponse();

        $accounts = Cuenta::query()
            ->where('cliente_id', Auth::id())
            ->get();

        $response->data = [
            'accounts' => $accounts,
        ];

        return new JsonResponse($response);
    }

    public function store(Request $request)
    {
        $response = new BaseResponse();

        DB::transaction(function() use ($request) {
            $dato = Carbon::now();
            $cuenta = Cuenta::where('num_cuenta', $request->num_cuenta)->first();
            $cliente = User::query()->find($cuenta->cliente_id);

            $cuentaDestino = Cuenta::where('num_cuenta', $request->num_cuenta_destino)->first();

            Transaccion::create([
                'monto' => $request->get('monto'),
                'fecha' => $dato->toDateString(),
                'hora' => $dato->toTimeString(),
                'ci_cliente' => $cliente->ci,
                'nombre_cliente' => strtoupper($cliente->nombre .' '. $cliente->apellido_pat .' '. $cliente->apellido_mat) ,
                'tipo' => 'TRANSACCION',
                'cod_funcionario' => Auth::user()->codigo,
                'descripcion' => 'Transferencia a caja de ahorro',
                'num_cuenta_id' => $cuenta->id,
                'num_cuenta_destino' => $cuentaDestino->id
            ]);

            $cuenta->update([
                'saldo' => $cuenta->saldo - $request->monto
            ]);

            $cuentaDestino->update([
                'saldo' => $cuentaDestino->saldo + $request->monto
            ]);

            Bitacora::register(
                'crear', 'se ha creado la deposito del numero de cuenta' . $request->num_cuenta, '168.154.52.1'
            );
        });

        $response->message = 'Transaccion Exitosa.';

        return new JsonResponse($response);
    }
}
