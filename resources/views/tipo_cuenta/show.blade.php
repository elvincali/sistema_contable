@extends('layouts.layout')

@section('css')
    <link rel="stylesheet" href="/adminlte/summernote/summernote-bs4.min.css">
@endsection

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

                <form action="{{ route('tipo-cuentas.store') }}" method="POST" enctype="multipart/form-data">
                    <!--Método que permite ingresar datos-->
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <img src="/img/tipo_cuenta/{{ $tipo_cuenta->imagen }}" alt="Product Image" class="img-fluid mx-auto d-block">
                        </div>
                        <div class="form-group col-md-8">
                            <span>{{ $tipo_cuenta->nombre }}</span> <br>
                            <span>{{ $tipo_cuenta->descripcion }}</span> <br>
                            <strong>Tasa de interes: </strong>{{ $tipo_cuenta->tasa_interes }}% <br>
                            <strong>Monto minimo de apertura: </strong> {{ $tipo_cuenta->apertura_minima }} <br>
                            @if ( $tipo_cuenta->retiros_mes == null )
                                <strong>Maximo retiros/mes: </strong> Ilimitado <br>
                            @else
                                <strong>Maximo retiros/mes: </strong> {{ $tipo_cuenta->retiros_mes }} <br>
                            @endif
                            <strong>Moneda: </strong> {{ $tipo_cuenta->moneda }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="card card-info">
                                <span class="card-header">Caracteristicas: </span>
                                <ul>
                                    @foreach ($tipo_cuenta->caracteristicas as $caracteristica)
                                        <li>{{ $caracteristica }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="card card-info">
                                <span class="card-header">Ventajas: </span>
                                <ul>
                                    @foreach ($tipo_cuenta->ventajas as $ventaja)
                                        <li>{{ $ventaja }}</li>
                                    @endforeach
                                </ul>
                            </div>
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
    <script src="/adminlte/summernote/summernote-bs4.min.js"></script>
@endsection
