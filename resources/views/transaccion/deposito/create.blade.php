@extends('layouts.layout')

@section('contenido')
    <div class="container" id="Contenido">
        <div class="row" id="tabla">
            <div class="col-12">
                <div class="row">
                    <h4>Añadiendo nuevo Deposito</h4>
                </div>

                <form action="{{ route('depositos.store') }}" method="POST" enctype="multipart/form-data">
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
                                            <input type="number" name="ci" class="form-control @error('cuenta_origen') is-invalid @enderror" value="{{old('cuenta_origen')}}">
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
                                            <input type="text" name="apellido_pat" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Apellido Materno</label>
                                            <input type="text" name="apellido_mat" class="form-control">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
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
                                            <label>Numero de Cuenta</label>
                                            <input type="number" id="num_cuenta" name="num_cuenta" class="form-control">
                                            <span class="text-danger" id="error" style="display: none"></span>
                                            <input type="button" value="Validar Cuenta" onclick="validarCuenta()">
                                        </div>
                                        <div class="form-group col-12">
                                            <label>Nombre Titular</label>
                                            <input type="text" class="form-control" id="nombre_titular" disabled>
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
                                            <label>Monto a Depositar</label>
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
        function validarCuenta() {
            var num_cuenta = $('#num_cuenta').val(); 
            $.ajax({
                type: "POST", 
                url: "/api/validar-cuenta", 
                data: {
                    num_cuenta: num_cuenta,
                    tipo: 'DEPOSITO'
                } 
            }).done(function(result) {
                var elemento = document.getElementById("num_cuenta");
                if (result.error) {
                    elemento.classList.add('is-invalid');
                    document.getElementById('error').style.display = 'block'
                    document.getElementById('nombre_titular').value = ''
                    document.getElementById('div_cuenta').style.display = 'none'
                }else{
                    console.log(result);
                    elemento.classList.remove('is-invalid');
                    elemento.classList.add('is-valid');
                    document.getElementById('error').style.display = 'none'
                    document.getElementById('error').value = result.error
                    document.getElementById('nombre_titular').value = result['nombre'] +' '+ result['apellido_pat'] +' '+ result['apellido_mat'];
                    document.getElementById('div_cuenta').style.display = 'block'
                }
            });
        }
    </script>
@endsection
