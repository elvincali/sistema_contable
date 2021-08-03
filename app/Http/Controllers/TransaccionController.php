<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\MontoAceptado;
use App\Rules\RetirosPermitidos;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use DB;

use App\User;
use App\Cuenta;
use App\TipoCuenta;
use App\Cliente;
use App\Transaccion;

class TransaccionController extends Controller
{
    public function index(){
        $transacciones = Transaccion::join('cuentas', 'num_cuenta_id', 'cuentas.id')
                                    ->join('users', 'cliente_id', 'users.id')
                                    ->select('transaccions.*', 'users.nombre', 'users.apellido_pat', 'num_cuenta as cuenta_origen')
                                    ->get();
        
        return view('transaccion.index', compact('transacciones')); 
    }

    public function create(){
        return view('transaccion.transaccion.create');
    }

    public function store(Request $request){
        $request->validate([
            'cuenta_origen' => ['bail', 'required', 'exists:cuentas,num_cuenta', new RetirosPermitidos($request->tipo)],
            'monto' => ['bail', 'required', new MontoAceptado($request->cuenta_origen, $request->tipo)],
        ],[
            'cuenta_origen.required' => 'debe ingresar una cuenta',
            'cuenta_origen.exists' => 'Esta cuenta no ha sido encontrada',
            'monto.required' => 'debe ingresar un monto',
        ]);

        try {
            DB::transaction(function() use ($request) {
                $dato = Carbon::now();
                Transaccion::create([
                'monto' => $request->monto,
                'fecha' => $dato->toDateString(),
                'hora' => $dato->toTimeString(),
                'tipo' => $request->tipo,
                'cuenta_origen_id' => Cuenta::where('num_cuenta', $request->cuenta_origen)->first()->id,
                'cajero_id' => Auth::id(),
                ]);

                $cuenta = Cuenta::where('num_cuenta', $request->cuenta_origen)->first();
                if ($request->tipo == 'Deposito') {
                    $cuenta->update([
                        'saldo' => $cuenta->saldo + $request->monto,
                    ]); 
                } else {
                    $cuenta->update([
                        'saldo' => $cuenta->saldo - $request->monto,
                        'retiros_mes' => $cuenta->retiros_mes + 1,
                    ]); 
                }    
            });
        } catch (\Exception $e) {
            return back()->with(['message' => 'Ha ocurrido un problema, Vuelve a intentarlo']);
        }
        return redirect('transacciones')->with(['message' => 'Transaccion realizada exitosamente']);
    }

    public function show(){

    }

    public function edit(){

    }

    public function update(){

    }
}
