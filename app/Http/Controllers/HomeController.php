<?php

namespace App\Http\Controllers;
use App\Bitacora;
use App\User;
use App\Cliente;
use App\Cuenta;
use App\Transaccion;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard');
    }

    public function subirImagen(Request $request){
        $nombre_imagen = $request->file('imagen')->getClientOriginalName();
        $request->file('imagen')->move('img/sucursal', $nombre_imagen); 
    }

    public function bitacora(){
        $bitacoras = file(Storage_path() . '/app/bitacora.log');
        for ($i=0; $i < count($bitacoras); $i++) { 
            $bitacoras[$i] = explode('--', $bitacoras[$i]);
        }
        
        return view('bitacora.index', compact('bitacoras'));
    }

    public function reporte(Request $request){
        return view('pdf.reporte');
    }

    public function reporteBuscar(Request $request){
        return view('pdf.reporte');         

    }

    function deposito(Request $request){
        
    }

    function retiro(Request $request){
        
    }

    function transaccion(Request $request){
        
    }
}
