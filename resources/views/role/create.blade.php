@extends('layouts.layout')

@section('contenido')
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Roles</h1>
            </div>
            <div class="col-sm-6">
            </div>
        </div>
    </div>

    <div class="container" id="Contenido">
        <div class="row" id="tabla">
            <div class="col-12">
                <div class="row">
                    <h4>Datos de los Roles</h4>
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

                <form action="{{ route('roles.store') }}" method="POST" enctype="multipart/form-data">
                    <!--Método que permite ingresar datos-->
                    @csrf

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Nombre</label>
                            <input type="text" name="nombre" class="form-control"
                                placeholder="Ingrese el nombre del rol">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Descripcion</label>
                            <input type="text" name="descripcion" class="form-control"
                                placeholder="Ingrese la descripcion del rol">
                        </div>
                    </div>

                    <div class="row">
                        @foreach ($permisos as $permiso )
                            <div class="form-group clearfix col-lg-2 col-sm-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permisos[]" value="{{ $permiso->id }}">
                                    <label class="form-check-label">{{ $permiso->name }}</label>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <button type="submit" class="btn btn-primary">Registrar</button>
                            <button type="reset" class="btn btn-danger">Cancelar</button>
                            <a href="{{ route('roles.index') }}" type="button" class="btn btn-secondary">Atrás</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection

@section('js')

@endsection
