@extends('layouts.layout')

@section('contenido')
<div class="container">
    <h1 class="display-4 text-center"><strong>{{ $sucursal->nombre }}</strong></h1>
    <br>
    <div class="row">
        <div class="col-lg-4">
            <img src="{{ Storage::url($sucursal->imagen) }}" alt="Product Image" class="img-fluid mx-auto d-block">
        </div>
        <div class="col-lg-8">
            <h4 class="lead mt-4 text-center"><strong>Dirección: </strong>{{ $sucursal->direccion }}</h4>
        <h4 class="lead text-center"><strong>Lugar: </strong>{{ $sucursal->sitio }}</h4>
        <h4 class="lead text-center"><strong></strong>Horarios de Atencion</h4>
        <h4 class="lead text-center">Lunes a Viernes de: 08:00:00 a 16:00:00</h4>
        <h4 class="lead text-center">Sábados de: 08:00:00 a 12:00:00</h4>
        <div class="row mt-4 ml-auto justify-content-center">
            <a href="{{ route('sucursales.index') }}" type="button" class="btn btn-secondary">Atrás</a>
        </div>
        </div>
        
        
    </div>
</div>
@endsection

