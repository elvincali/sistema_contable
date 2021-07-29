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
                <h2>Lista de Depositos</h2>
                @can('crear cuenta')
                    <a href="{{ route('transacciones.create') }}" class="btn btn-outline-success btn-sm ml-5">Añadir</a>
                @endcan
            </div>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Tipo</th>
                        <th>Monto</th>
                        <th>Fecha</th>
                        <th>Cuenta Origen</th>
                        <th>Cuenta Destino</th>
                        <th>Usuario</th>
                        <th>Cajero</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transacciones as $transaccion)
                        <tr>
                            @if ( $transaccion->tipo == 'deposito' )
                                <td><small class="badge badge-success">{{ $transaccion->tipo }}</small></td>
                            @else
                                <td><small class="badge badge-danger">{{ $transaccion->tipo }}</small></td>
                            @endif
                            <td>{{ $transaccion->monto }}</td>
                            <td>{{ $transaccion->fecha }}</td>
                            <td>{{ $transaccion->cuenta_origen }}</td>
                            <td>{{ $transaccion->cuenta_destino_id }}</td>
                            <td>{{ $transaccion->nombre .' '. $transaccion->apellido_pat }}</td>
                            <td>{{ $transaccion->cajero_id }}</td>
                            <td>
                                @can('mostrar transaccion')
                                    <a class="btn btn-info mt-1" href="{{ route('transacciones.show', $transaccion->id) }}">
                                        <i class="far fa-eye"></i>
                                    </a>
                                @endcan
                            </td>
                        </tr>
                    @empty
                        <span>span no hay registros</span>
                    @endforelse

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
