@extends('layouts.layout')

@section('contenido')
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tipo de Cuenta</h1>
            </div>
            <div class="col-sm-6">
            </div>
        </div>
    </div>

    <div class="container" id="Contenido">
        <div class="row" id="tabla">
            <div class="col-12">
                <div class="row">
                    <h4>Datos de los Tipos de Cuenta</h4>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <form action="{{ route('tipo-cuentas.update', $tipo_cuenta->id) }}" method="POST" enctype="multipart/form-data">
                    <!--Método que permite ingresar datos-->
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Nombre</label>
                            <input type="text" name="nombre" class="form-control" value="{{ $tipo_cuenta->nombre }}">
                            <label>Imagen</label>
                            <input type="file" name="imagen" class="form-control" value="{{ $tipo_cuenta->imagen }}">
                        </div>
                        <div class="form-group col-md-8">
                            <label>Descripcion</label>
                            <textarea name="descripcion" class="form-control" rows="4">{{ $tipo_cuenta->descripcion }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>Tasa Interes (%)</label>
                            <input type="number" name="tasa_interes" step="0.01" class="form-control" value="{{ $tipo_cuenta->tasa_interes }}">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Monto minimo</label>
                            <input type="number" name="apertura_minima" class="form-control" value="{{ $tipo_cuenta->apertura_minima }}">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Retiros maximos por mes</label>
                            <input type="number" name="retiros_mes" class="form-control" value="{{ $tipo_cuenta->retiros_mes }}">
                            <input type="radio" name="ilimitado">
                            <label for="html">Ilimitado</label>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Moneda</label>
                            <select class="form-control" name="moneda_id">
                            <option>Seleccionar Moneda</option>
                            @foreach ($monedas as $moneda)
                                <option value="{{$moneda->id}}">{{$moneda->nombre}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Caracteristicas</label>
                            <textarea name="caracteristicas" class="form-control" rows="5">{{ $tipo_cuenta->caracteristicas }}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Ventajas</label>
                            <textarea name="ventajas" class="form-control" rows="5">{{ $tipo_cuenta->ventajas }}
                            </textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <button type="submit" class="btn btn-primary">Registrar</button>
                            <button type="reset" class="btn btn-danger">Cancelar</button>
                            <a href="{{ route('tipo-cuentas.index') }}" type="button" class="btn btn-secondary">Atrás</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection

@section('js')

@endsection
