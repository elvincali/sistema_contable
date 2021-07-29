@extends('layouts.app')

@section('contenido')
    <section id="doctors" class="doctors">
        <div class="container">
            {{-- <div class="section-title">
                <h2>Enfermeras</h2>
            </div> --}}
            <div id="actionbar" class="action-bar show-action-bar m-2">
                <div class="container-fluid d-flex align-items-center justify-content-between content-action-bar">
                    <div class="d-flex align-items-center flex-wrap mr-1">
                        <div class="d-flex align-items-baseline flex-wrap mr-5">
                            <h5 class="my-1 mr-3">Lista de Servicios de Enfermeria</h5>
                        </div>
                    </div>
                    <a href="{{ route('enfermeras.add') }}">
                        <button type="button" class="btn btn-info"><i class="fa fa-user-plus"></i>
                            Añadir Nuevo
                        </button>
                    </a>
                </div>
            </div>

            <div class="row">
                @foreach ($servicios as $servicio)
                    <div class="col-lg-4 col-md-6 mt-4">
                        <div class="icon-box">
                            <a href="">
                                <img class="card-img-top" src="/img/servicio/{{$servicio['imagen']}}" alt="Card image cap" height="200">
                            </a>
                            <h4><a href="">{{$servicio->nombre}}</a></h4>
                            <p>{{$servicio->descripcion}}</p>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section>
@endsection

@section('js')
    <script src="https://kit.fontawesome.com/ef6287927a.js" crossorigin="anonymous"></script>
@endsection
