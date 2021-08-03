<?php

namespace App\Http\Controllers;

use App\TipoCuenta;
use App\Cuenta;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    function validarCuenta(Request $request){
        $cuenta = Cuenta::join('users', 'cliente_id', 'users.id')
                        ->where('users.ci', $request->ci)
                        ->orWhere('cuentas.num_cuenta', $request->num_cuenta)
                        ->select('num_cuenta', 'ci', 'tipo_cuenta_id', 'retiros_mes', 'nombre', 'apellido_pat', 'apellido_mat')
                        ->first(); 
                        
        if ($cuenta) {
            if ($request->tipo == 'DEPOSITO') {
                return response()->json($cuenta, 200);
            } else {
                $retiros_permitidos = TipoCuenta::find($cuenta->tipo_cuenta_id)->retiros_mes;
                if ($retiros_permitidos != 0) {
                    if ($cuenta->retiros_mes < $retiros_permitidos) {
                        return response()->json($cuenta, 200);
                    } else {
                        return response()->json(['error' => 'esta cuenta excedio el maximo de Retiros/mes' ], 200);
                    }
                } else {
                    return response()->json($cuenta, 200);
                }
            }
        }
        return response()->json(['error' => 'Cuenta no encontrada'], 200);
    }
}
