@extends('layouts.layout')

@section('contenido')
    <div class="container" id="Contenido">
        <div class="row" id="tabla">
            <div class="col-12">
                <div class="row">
                    <h4>Añadiendo nuevo Cliente</h4>
                </div>

                <form action="{{ route('clientes.store') }}" method="POST" enctype="multipart/form-data">
                    <!--Método que permite ingresar datos-->
                    @csrf

                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card card-info">
                                <div class="card-header">
                                    <span class="card-tittle">
                                        Datos de Cliente
                                    </span>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>C.I.</label>
                                            <input type="number" name="ci" class="form-control @error('ci') is-invalid @enderror" value="{{old('ci')}}">
                                            @error('ci')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Nombre</label>
                                            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{old('nombre')}}">
                                            @error('nombre')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Apellido Paterno</label>
                                            <input type="text" name="apellido_pat" class="form-control" value="{{old('apellido_pat')}}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Apellido Materno</label>
                                            <input type="text" name="apellido_mat" class="form-control" value="{{old('apellido_mat')}}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Fecha Nacimiento</label>
                                            <input type="date" name="fecha_nac" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Celular</label>
                                            <input type="number" name="telefono" class="form-control" value="{{old('telefono')}}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Direccion</label>
                                            <input type="text" name="direccion" class="form-control" value="{{old('direccion')}}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Email</label>
                                            <input type="text" name="email" class="form-control" value="{{old('email')}}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card card-info">
                                <div class="card-header">
                                    <span class="card-tittle">
                                        Adicional
                                    </span>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <label>Genero</label>
                                        <select class="form-control" name="genero">
                                        <option>Seleccionar Genero</option>
                                            <option>Masculino</option>
                                            <option>Femenino</option>
                                        </select>
                                        <div class="form-group col-12">
                                            <label>Nacionalidad</label>
                                            <input type="text" name="nacionalidad" class="form-control" value="{{old('nacionalidad')}}">
                                        </div>
                                        <div class="form-group col-12">
                                            <label>Estado Civil</label>
                                            <input type="text" name="estado_civ" class="form-control" value="{{old('estado_civ')}}">
                                        </div>
                                        <div class="form-group col-12">
                                            <label>Ocupacion</label>
                                            <input type="text" name="ocupacion" class="form-control" value="{{old('ocupacion')}}">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Imagen</label>
                                            <input type="file" name="imagen" class="form-control">
                                        </div>
                                    </div>
                                </div>

                            </div>
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


