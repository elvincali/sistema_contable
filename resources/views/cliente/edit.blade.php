@extends('layouts.layout')

@section('contenido')
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Clientes</h1>
            </div>
            <div class="col-sm-6">
            </div>
        </div>
    </div>

    <div class="container" id="Contenido">
        <div class="row" id="tabla">
            <div class="col-12">
                <div class="row">
                    <h4>Datos de clientes</h4>
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

                <form action="{{ route('clientes.update', $cliente->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>C.I.</label>
                            <input type="number" name="ci" class="form-control" value="{{ $cliente->ci }}">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Nombre</label>
                            <input type="text" name="nombre" class="form-control" value="{{ $cliente->nombre }}">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Apellido Paterno</label>
                            <input type="text" name="apellido_pat" class="form-control" value="{{ $cliente->apellido_pat }}">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Apellido Materno</label>
                            <input type="text" name="apellido_mat" class="form-control" value="{{ $cliente->apellido_mat }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Fecha de Nacimiento</label>
                            <input type="date"name="fecha_nac" class="form-control" value="{{ $cliente->fecha_nac }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Celular</label>
                            <input type="number" name="telefono" class="form-control" value="{{ $cliente->telefono }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Direccion</label>
                            <input type="text" name="direccion" class="form-control" value="{{ $cliente->direccion }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Email</label>
                            <input type="text" id="direccion" name="email" class="form-control" value="{{ $cliente->email }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Genero</label>
                            <select class="form-control" name="genero">
                                <option>Seleccionar Genero</option>
                                <option>Masculino</option>
                                <option>Femenino</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Nacionalidad</label>
                            <input type="text" id="direccion" name="nacionalidad" class="form-control" value="{{ $cliente->nacionalidad }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Estado Civil</label>
                            <input type="text" name="estado_civ" class="form-control" value="{{ $cliente->estado_civ }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Ocupacion</label>
                            <input type="text" name="ocupacion" class="form-control" value="{{ $cliente->ocupacion }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Imagen</label>
                            <input type="file" name="imagen" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <button type="submit" class="btn btn-primary">Registrar</button>
                            <button type="reset" class="btn btn-danger">Cancelar</button>
                            <a href="{{ route('clientes.index') }}" type="button" class="btn btn-secondary">Atrás</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection

@section('js')

@endsection
