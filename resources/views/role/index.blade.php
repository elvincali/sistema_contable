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
                <h2>Lista de Roles</h2>
                @can('crear rol')
                    <a href="{{ route('roles.create') }}" class="btn btn-outline-success btn-sm ml-5">Añadir</a>
                @endcan
            </div>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $rol)
                        <tr>
                            <td>{{ $rol->id }}</td>
                            <td>{{ $rol->name }}</td>
                            <td>{{ $rol->guard_name }}</td>
                            <td>
                                @can('mostrar rol')
                                    <a class="btn btn-info mt-1" href="{{ route('roles.show', $rol->id) }}">
                                        <i class="far fa-eye"></i>
                                    </a>
                                @endcan
                                @can('editar rol')
                                    <a class="btn btn-warning mt-1" href="{{ route('roles.edit', $rol->id) }}">
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
