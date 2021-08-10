<?php

namespace App\Http\Controllers;
use App\Bitacora;

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
        $bitacoras = Bitacora::all();

        return view('bitacora.index', compact('bitacoras'));
    }
}
