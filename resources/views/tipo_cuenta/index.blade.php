@extends('layouts.layout')

@section('css')
    <link rel="stylesheet" href="/adminlte/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/adminlte/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/adminlte/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('contenido')
    <div class="row mb-2">
        <div class="col-12">
            <div class="row align-items-center">
                <h2>Lista de Tipo de Cuenta</h2>
                @can('crear tipo cuenta')
                    <a href="{{ route('tipo-cuentas.create') }}" class="btn btn-outline-success btn-sm ml-5">Añadir</a>
                @endcan
            </div>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Interes</th>
                        <th>Apertura Minima</th>
                        <th>Maximo retiro/mes</th>
                        <th>Moneda</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tipo_cuentas as $tipo_cuenta)
                        <tr>
                            <td><img src="/img/tipo_cuenta/{{ $tipo_cuenta->imagen }}" width="40" height="40"></td>
                            <td>{{ $tipo_cuenta->nombre }}</td>
                            <td>{{ $tipo_cuenta->descripcion }}</td>
                            <td>{{ $tipo_cuenta->tasa_interes }}%</td>
                            <td>{{ $tipo_cuenta->apertura_minima }}</td>
                            @if ( $tipo_cuenta->retiros_mes == null )
                                <td>Ilimitado</td>
                            @else
                                <td>{{ $tipo_cuenta->retiros_mes }}</td>
                            @endif
                            <td>{{ $tipo_cuenta->moneda }}</td>
                            <td>
                                @can('mostrar tipo cuenta')
                                    <a class="btn btn-info mt-1" href="{{ route('tipo-cuentas.show', $tipo_cuenta->id) }}">
                                        <i class="far fa-eye"></i>
                                    </a>
                                @endcan
                                @can('editar tipo cuenta')
                                    <a class="btn btn-warning mt-1" href="{{ route('tipo-cuentas.edit', $tipo_cuenta->id) }}">
                                        <i class="far fa-edit"></i>
                                    </a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach

                    </tfoot>
            </table>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection

@section('js')
    <!-- DataTables  & Plugins -->
    <script src="/adminlte/datatables/jquery.dataTables.min.js"></script>
    <script src="/adminlte/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/adminlte/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/adminlte/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/adminlte/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/adminlte/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/adminlte/jszip/jszip.min.js"></script>
    <script src="/adminlte/pdfmake/pdfmake.min.js"></script>
    <script src="/adminlte/pdfmake/vfs_fonts.js"></script>
    <script src="/adminlte/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/adminlte/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/adminlte/datatables-buttons/js/buttons.colVis.min.js"></script>
    @role('admin')
        @include('partials.datatableAdmin')
    @else
        @include('partials.datatable')
    @endrole
    
@endsection
