<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Moneda;
use App\Bitacora;

class MonedaController extends Controller
{
    public function index(){
        $monedas = Moneda::all();

        return view('moneda.index', compact('monedas'));
    }

    public function create(){
        return view('moneda.create');
    }

    public function store(Request $request){
        $moneda = new Moneda();

        $moneda->nombre = $request->nombre;
        $moneda->abreviacion = $request->abreviacion;

        $moneda->save();
        return redirect()->route('monedas.index')->with(['message' => 'la Moneda se ha creado exitosamente']);
    }

    public function edit($id){
        $moneda = Moneda::find($id);

        return view('moneda.edit', compact('moneda'));
    }

    public function update(Request $request, $id){
        $moneda = Moneda::find($id);

        $moneda->nombre = $request->nombre;
        $moneda->abreviacion = $request->abreviacion;
        $moneda->save();

        return redirect()->route('monedas.index')->with(['message' => 'la Moneda a sido actualizada exitosamente']);
    }
}
