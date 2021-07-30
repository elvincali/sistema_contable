@extends('layouts.layout')

@section('contenido')
    <div class="container" id="Contenido">
        <div class="row" id="tabla">
            <div class="col-12">
                <div class="row">
                    <h4>Añadiendo nuevo Deposito</h4>
                </div>

                <form action="{{ route('retiros.store') }}" method="POST" enctype="multipart/form-data">
                    <!--Método que permite ingresar datos-->
                    @csrf

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card card-info">
                                <div class="card-header">
                                    <span class="card-tittle">
                                        Datos de Cuenta
                                    </span>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-12" id="div_num_cuenta">
                                            <label>C.I.</label>
                                            <input type="number" id="ci" name="ci" class="form-control">
                                            <span class="text-danger" id="error" style="display: none">Cuenta no encontrada</span>
                                            <input type="button" value="Buscar Cuenta" onclick="buscarCuenta()">
                                        </div>
                                        <div class="form-group col-12">
                                            <label>Numero de Cuenta</label>
                                            <input type="number" class="form-control" name="num_cuenta" id="num_cuenta">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
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
                                            <label>Nombre</label>
                                            <input id="nombre" type="text" name="nombre" class="form-control" value="{{old('nombre')}}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Apellido Paterno</label>
                                            <input id="apellido_pat" type="text" name="apellido_pat" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Apellido Materno</label>
                                            <input id="apellido_mat" type="text" name="apellido_mat" class="form-control">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div id="div_cuenta" class="row" style="display: none">
                        <div class="col">
                            <div class="card card-info">
                                <div class="card-header">
                                    <span class="card-tittle">
                                        Datos de Cuenta
                                    </span>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label>Codigo Usuario</label>
                                            <input type="number" class="form-control" value="{{ Auth::user()->codigo }}" disabled>
                                        </div>
                                        <div class="form-group col-6">
                                            <label>Monto a Retirar</label>
                                            <input type="number" name="monto" class="form-control">
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

@section('js')
    <script>
        function buscarCuenta() {
            var ci_cliente = $('#ci').val(); // campo del formulario que voy a consultar
            $.ajax({ // incio petición
                type: "POST", //Cuando se haya enviado un formulario
                url: "/api/validar-cuenta", //se invoca el archivo infoclientes.php
                data: {
                    ci: ci_cliente
                } //asigno el campo a la variable de peticion sql
            }).done(function(result) { //recibo el resulta
                console.log(result);
                var elemento = document.getElementById("ci");
                if (result) {
                    console.log(result);
                    elemento.classList.remove('is-invalid');
                    elemento.classList.add('is-valid');
                    document.getElementById('error').style.display = 'none'
                    document.getElementById('num_cuenta').value = result['num_cuenta'];
                    document.getElementById('nombre').value = result['nombre'];
                    document.getElementById('apellido_pat').value = result['apellido_pat'];
                    document.getElementById('apellido_mat').value = result['apellido_mat'];
                    document.getElementById('div_cuenta').style.display = 'block'
                }else{
                    elemento.classList.add('is-invalid');
                    document.getElementById('error').style.display = 'block'
                }
            });
        }
    </script>
@endsection
