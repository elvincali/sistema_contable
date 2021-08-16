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
        return view('pdf.index');
    }

    public function reporteBuscar(Request $request){
        // return $request;
        $items = Cliente::join('users', 'users.id', 'user_id')
                    ->join('cuentas', 'cliente_id', 'users.id')
                    // ->join('tipo_cuentas', 'tipo_cuentas.id', 'tipo_cuenta_id')
                    ->join('transaccions', 'cuentas.id', 'num_cuenta_id')
                    ->where('num_cuenta', 10001234407504112)
                    ->get();
                    // $items = $user->groupBy('user_id');
        // return $user;
        return $items;
        return view('pdf.index', compact('items'));          

    }
}
