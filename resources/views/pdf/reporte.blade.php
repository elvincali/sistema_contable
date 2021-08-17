@extends('layouts.layout')

@section('contenido')
    <div class="card">
        <form method="POST" action="{{ route('reporte.deposito') }}">
            <div class="card-header">
                Reporte de Depositos
            </div>
            <div class="card-body">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Fecha Minima</label>
                        <input type="date" name="fecha_min" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Fecha Maxima</label>
                        <input type="date" name="fecha_max" class="form-control">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </form>
    </div>
    <div class="card">
        <form method="POST" action="{{ route('reporte.retiro') }}">
            <div class="card-header">
                Reporte de Retiros
            </div>
            <div class="card-body">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Fecha Minima</label>
                        <input type="date" name="fecha_min" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Fecha Maxima</label>
                        <input type="date" name="fecha_max" class="form-control">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </form>
    </div>
    <div class="card">
        <form method="POST" action="{{ route('reporte.cliente') }}">
            <div class="card-header">
                Reporte de Cliente
            </div>
            <div class="card-body">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Numero Cuenta</label>
                        <input type="text" name="num_cuenta" class="form-control">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </form>
    </div>
@endsection
