@extends('layouts.layout')

@section('css')
    <link rel="stylesheet" href="/adminlte/select2/select2.min.css">
@endsection

@section('contenido')
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Cuentas</h1>
            </div>
            <div class="col-sm-6">
            </div>
        </div>
    </div>

    <div class="container" id="Contenido">
        <div class="row" id="tabla">
            <div class="col-12">
                <div class="row">
                    <h4>Datos de cuenta</h4>
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

                <form action="{{ route('cuentas.store') }}" method="POST" enctype="multipart/form-data">
                    <!--Método que permite ingresar datos-->
                    @csrf

                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Cédula de Identidad</label>
                            <select name="cliente_id" id="clientes" class="form-control">
                            @foreach ($clientes as $cliente)
                                <option value="{{ $cliente->id }}">
                                    {{"CI " . $cliente->ci   . " | " .  
                                    $cliente->nombre ." ". $cliente->apellido_pat ." ". $cliente->apellido_mat}}
                                </option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-8">
                            <label>Tipo de Cuenta</label>
                            <select name="tipo_cuenta_id" class="form-control">
                                @foreach ($tipo_cuentas as $tipo_cuenta)
                                    <option value="{{ $tipo_cuenta->id }}">
                                        {{ $tipo_cuenta->nombre ." | Tasa de Interes: ". 
                                        $tipo_cuenta->tasa_interes ."% | Monto minimo de Apertura: ".
                                        $tipo_cuenta->apertura_minima }}
                                    </option>
                                @endforeach
                                </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Saldo</label>
                            <input type="number" name="saldo" class="form-control">
                        </div> 
                        <div class="form-group col-md-8">
                            <label>Seleccionar Sucursal</label>
                            <select class="form-control" name="sucursal_id">
                                @foreach ($sucursales as $sucursal)
                                    <option value="{{ $sucursal->id }}">
                                        {{ $sucursal->nombre }}
                                    </option>                                    
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <button type="submit" class="btn btn-primary">Registrar</button>
                            <button type="reset" class="btn btn-danger">Cancelar</button>
                            <a href="{{ route('cuentas.index') }}" type="button" class="btn btn-secondary">Atrás</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection

@section('js')
<script src="/adminlte/select2/select2.full.min.js"></script>
<script>
  $(document).ready(function() {
    console.log('o')
      $('#clientes').select2();
  });
  
  </script>
@endsection
