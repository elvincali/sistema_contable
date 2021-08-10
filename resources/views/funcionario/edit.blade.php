@extends('layouts.layout')

@section('contenido')
    <div id="contact" class="container">
        <div class="row">
            <div class="col-lg-4">
                <section class="bar mb-0">
                    <img src="{{ Storage::url($funcionario->foto) }}" style="width: 100%">
                </section>
            </div>
            <div class="col-lg-8">
                <section class="bar">
                    <form action="{{ route('funcionarios.update', $funcionario->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
    
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Nombre</label>
                                <input type="text" name="nombre"  value="{{ $funcionario->nombre }}" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Apellido Paterno</label>
                                <input type="text" name="apellido_pat"  value="{{ $funcionario->apellido_pat }}" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Apellido Materno</label>
                                <input type="text" name="apellido_mat"  value="{{ $funcionario->apellido_mat }}" class="form-control">
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Fecha de Nacimiento</label>
                                <input type="date"name="fecha_nac"  value="{{ $funcionario->fecha_nac }}" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Celular</label>
                                <input type="number" name="telefono"  value="{{ $funcionario->telefono }}" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Direccion</label>
                                <input type="text" name="direccion"  value="{{ $funcionario->direccion }}" class="form-control">
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Email</label>
                                <input type="text" id="direccion" name="email"  value="{{ $funcionario->email }}" class="form-control">
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
                                <input type="file" name="imagen"  value="{{ $funcionario->nombre }}" class="form-control">
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
                    
                </section>
            </div>
        </div>
    </div>
@endsection
