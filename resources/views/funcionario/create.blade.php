@extends('layouts.layout')

@section('contenido')
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Funcionarios</h1>
            </div>
            <div class="col-sm-6">
            </div>
        </div>
    </div>

    <div class="container" id="Contenido">
        <div class="row" id="tabla">
            <div class="col-12">
                <div class="row">
                    <h4>Datos de Funcionarios</h4>
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

                <form action="{{ route('funcionarios.store') }}" method="POST" enctype="multipart/form-data">
                    <!--Método que permite ingresar datos-->
                    @csrf

                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Nombre</label>
                            <input type="text" name="nombre" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Apellido Paterno</label>
                            <input type="text" name="apellido_pat" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Apellido Materno</label>
                            <input type="text" name="apellido_mat" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Fecha de Nacimiento</label>
                            <input type="date"name="fecha_nac" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Celular</label>
                            <input type="number" name="telefono" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Direccion</label>
                            <input type="text" name="direccion" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Email</label>
                            <input type="text" id="direccion" name="email" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Rol</label>
                            <select class="form-control" name="rol">
                            <option>Seleccionar Rol</option>
                            @foreach ($roles as $rol)
                                <option value="{{$rol->name}}">{{$rol->name}}</option>
                            @endforeach
                            </select>
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
                            <a href="{{ route('funcionarios.index') }}" type="button" class="btn btn-secondary">Atrás</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection

@section('js')

@endsection
