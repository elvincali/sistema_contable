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
        $depositos = Transaccion::where('tipo', 'DEPOSITO')
                                ->whereBetween('fecha', [$request->fecha_min, $request->fecha_max])
                                ->get();
        return $depositos;
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('pdf.templatePdf', compact('depositos'));
        return $pdf->stream();
        // return view('pdf.templatePdf');
    }
}
