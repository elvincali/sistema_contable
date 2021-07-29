<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sucursal;

class SucursalController extends Controller
{
    public function index(){
        $sucursales = Sucursal::all();

        return view('sucursal.index', compact('sucursales'));
    }

    public function create(){
        return view('sucursal.create');
    }

    public function store(Request $request)
    {
        $sucursales = new Sucursal();
        $sucursales->nombre = request('nombre');

        $nombre_imagen = $request->file('imagen')->getClientOriginalName();
        $request->file('imagen')->move('img/sucursal', $nombre_imagen);  
        $sucursales->imagen = $nombre_imagen;

        $sucursales->inicio_atencion = request('inicio_atencion');
        $sucursales->fin_atencion = request('fin_atencion');
        $sucursales->latitude = request('latitude');
        $sucursales->longitude = request('longitude');
        $sucursales->direccion = request('direccion');
        $sucursales->sitio = request('sitio');
        $sucursales->codigo = random_int(1000, 9999);

        $sucursales->save();
        $message = "Se ha creado la Sucursal ".$request->nombre." Satisfactoriamente";

        return redirect(route('sucursales.index'))->with('message', $message);
    }

    public function show($id){
        $sucursal = Sucursal::FindOrFail($id);

        return view('sucursal.show', compact('sucursal'));
    }

    public function edit($id){
        $sucursal = Sucursal::FindOrFail($id);

        return view('sucursal.edit', compact('sucursal'));
    }

    public function update(Request $request, $id)
    {
        $sucursal = Sucursal::findOrFail($id);
        $sucursal->nombre = $request->nombre;
        if ($request->hasFile('imagen')) {
            $nombre_imagen = $request->file('imagen')->getClientOriginalName();
            $request->file('imagen')->move('img/sucursal', $nombre_imagen);  
            $sucursal->imagen = $nombre_imagen;
        }
        $sucursal->update();
        $message = "La Sucursal se ha actualizado correctamente";

        return redirect(route('sucursales.index'))->with('message', $message);
    }
}
