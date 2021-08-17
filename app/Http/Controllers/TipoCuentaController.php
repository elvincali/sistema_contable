<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoCuenta;
use App\Moneda;
use Illuminate\Support\Facades\Storage;
use App\Bitacora;

class TipoCuentaController extends Controller
{
    public function index(){
        $tipo_cuentas = TipoCuenta::join('monedas', 'moneda_id','=', 'monedas.id')
                    ->select('tipo_cuentas.*', 'monedas.abreviacion as moneda')
                    ->get();
        
        return view('tipo_cuenta.index', compact('tipo_cuentas'));
    }

    public function create(){
        $monedas = Moneda::all();
        return view('tipo_cuenta.create', compact('monedas'));
    }

    public function store(Request $request){
        $tipo_cuenta = new TipoCuenta();

        if ($request->hasFile('imagen')) {
            $ruta = $request->file('imagen')->store('public');
            $tipo_cuenta->imagen = $ruta;
        }

        if ($request->ilimitado) {
            $tipo_cuenta->retiros_mes = 0;
        }else {
            $tipo_cuenta->retiros_mes = $request->retiros_mes;
        }
        $tipo_cuenta->nombre = strtoupper($request->nombre);
        $tipo_cuenta->descripcion = $request->descripcion;
        $tipo_cuenta->tasa_interes = $request->tasa_interes;
        $tipo_cuenta->apertura_minima = $request->apertura_minima;
        $tipo_cuenta->moneda_id = $request->moneda_id;
        $tipo_cuenta->ventajas = $request->ventajas;
        $tipo_cuenta->caracteristicas = $request->caracteristicas;
        $tipo_cuenta->save();

        return redirect()->route('tipo-cuentas.index')->with(['message' => 'el Tipo de Cuenta a sido creado exitosamente']);
    }

    public function edit($id){
        $tipo_cuenta = TipoCuenta::join('monedas', 'moneda_id', 'monedas.id')
                                ->where('tipo_cuentas.id', $id)
                                ->select('tipo_cuentas.*', 'monedas.nombre as moneda')
                                ->first();
        
        $monedas = Moneda::all();
        return view('tipo_cuenta.edit', compact('tipo_cuenta', 'monedas'));
    }

    public function update(Request $request, $id){
        $tipo_cuenta = TipoCuenta::findOrFail($id);

        if ($request->hasFile('imagen')) {
            $ruta = $request->file('imagen')->store('public');
            $tipo_cuenta->imagen = $ruta;
        }

        if ($request->ilimitado) {
            $tipo_cuenta->retiros_mes = null;
        }else {
            $tipo_cuenta->retiros_mes = $request->retiros_mes;
        }

        $tipo_cuenta->nombre = strtoupper($request->nombre);
        $tipo_cuenta->descripcion = $request->descripcion;
        $tipo_cuenta->tasa_interes = $request->tasa_interes;
        $tipo_cuenta->apertura_minima = $request->apertura_minima;
        $tipo_cuenta->moneda_id = $request->moneda_id;
        $tipo_cuenta->caracteristicas = $request->caracteristicas;
        $tipo_cuenta->ventajas = $request->ventajas;

        $tipo_cuenta->save();

        return redirect()->route('tipo-cuentas.index')->with(['message' => 'el Tipo de Cuenta a sido actualizado exitosamente']);
    }

    public function show($id){
        $tipo_cuenta = TipoCuenta::join('monedas', 'moneda_id', 'monedas.id')
                            ->where('tipo_cuentas.id', $id)
                            ->select('tipo_cuentas.*', 'monedas.nombre as moneda')
                            ->first();

        $tipo_cuenta->ventajas = explode('.', $tipo_cuenta->ventajas);
        $tipo_cuenta->caracteristicas = explode('.', $tipo_cuenta->caracteristicas);

        return view('tipo_cuenta.show', compact('tipo_cuenta'));
    }
}
