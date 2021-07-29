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
                <h2>Lista de Cuentas</h2>
                @can('crear cuenta')
                    <a href="{{ route('cuentas.create') }}" class="btn btn-outline-success btn-sm ml-5">Añadir</a>
                @endcan
            </div>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nº Cuenta</th>
                        <th>Retiros/mes</th>
                        <th>Fecha Apertura</th>
                        <th>Saldo</th>
                        <th>Tipo Cuenta</th>
                        <th>Titular</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($cuentas as $cuenta)
                        <tr>
                            <td>{{ $cuenta->num_cuenta }}</td>
                            <td>{{ $cuenta->retiros_mes }}</td>
                            <td>{{ $cuenta->fecha_apertura }}</td>
                            <td>{{ $cuenta->saldo }}</td>
                            <td>{{ $cuenta->tipo_cuenta }}</td>
                            <td>{{ $cuenta->nombre .' '. $cuenta->apellido }}</td>
                            <td>
                                @can('mostrar cuenta')
                                    <a class="btn btn-info mt-1" href="{{ route('cuentas.show', $cuenta->id) }}">
                                        <i class="far fa-eye"></i>
                                    </a>
                                @endcan
                                @can('editar cuenta')
                                    <a class="btn btn-warning mt-1" href="{{ route('cuentas.edit', $cuenta->id) }}">
                                        <i class="far fa-edit"></i>
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
