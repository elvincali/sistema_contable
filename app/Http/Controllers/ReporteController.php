<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

use App\User;
use App\Cliente;
use App\Bitacora;
use App\Transaccion;
use App\Cuenta;
use App\TipoCuenta;

class ReporteController extends Controller
{
    public function deposito(Request $request){
        $items = Transaccion::where('tipo', 'DEPOSITO')
                                ->whereBetween('fecha', [$request->fecha_min, $request->fecha_max])
                                ->get();
        for ($i=0; $i < count($items); $i++) { 
            $items[$i]->num_cuenta_id = Cuenta::where('id', $items[$i]->num_cuenta_id)->pluck('num_cuenta');
        }              
        // return $items;          
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('pdf.templatePdf', compact('items'));
        return $pdf->stream();
    }

    public function retiro(Request $request){
        $items = Transaccion::where('tipo', 'RETIRO')
                                ->whereBetween('fecha', [$request->fecha_min, $request->fecha_max])
                                ->get();
        for ($i=0; $i < count($items); $i++) { 
            $items[$i]->num_cuenta_id = Cuenta::where('id', $items[$i]->num_cuenta_id)->pluck('num_cuenta');
        }              
        // return $items;          
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('pdf.templatePdf', compact('items'));
        return $pdf->stream();
    }
}
