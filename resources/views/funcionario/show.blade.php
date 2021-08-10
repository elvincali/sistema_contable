@extends('layouts.layout')

@section('contenido')
    <div id="contact" class="container">
        <div class="row">
            <div class="col-lg-4">
                <section class="bar mb-0">
                    <img src="{{ Storage::url($funcionario->foto) }}" style="width: 100%">
                    <h3 class="text-uppercase">Contacto</h3>
                    <p class="text-sm">
                        <strong>Telefono:</strong> {{ $funcionario->telefono }}<br>
                        <strong>Correo:</strong> {{ $funcionario->email }}
                    </p>
                </section>
            </div>
            <div class="col-lg-8">
                <section class="bar">
                    <div class="heading">
                        <h2>
                            {{ strtoupper($funcionario->nombre)}} 
                            {{ strtoupper($funcionario->apellido_pat) }} 
                            {{ strtoupper($funcionario->apellido_mat) }}</h2>
                    </div>
                    <div class="heading">
                        <p class="text-sm">Rol: {{ $funcionario->roles[0]->name }}</p>
                    </div>
                    <p class="lead">
                        <strong>Telefono: </strong> {{ $funcionario->telefono }} <br>
                        <strong>Correo: </strong> {{ $funcionario->email }} <br>
                        <strong>Fecha de Nacimiento: </strong> {{ $funcionario->fecha_nac }} <br>
                        <strong>Direccion: </strong> {{ $funcionario->direccion }} <br>
                    </p>
                    
                    {{-- <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstname">Firstname</label>
                                    <input id="firstname" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastname">Lastname</label>
                                    <input id="lastname" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subject">Subject</label>
                                    <input id="subject" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea id="message" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-template-outlined"><i class="fa fa-envelope-o"></i>
                                    Send message</button>
                            </div>
                        </div>
                    </form> --}}
                </section>
            </div>
        </div>
    </div>
@endsection
