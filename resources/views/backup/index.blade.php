@extends('layouts.layout')

@section('css')
    <link rel="stylesheet" href="/adminlte/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/adminlte/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection

@section('contenido')
    <div class="row mb-2">
        <div class="col-12">
            <div class="row align-items-center">
                <h2>Lista de Base de Datos Guardadas</h2>
                @can('crear sucursal')
                    <a href="{{ route('database.backup') }}" class="btn btn-outline-success btn-sm ml-5">Añadir</a>
                @endcan
            </div>

            <table id="example1" class="table table-bordered table-striped table-sm">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($backups as $backup)
                        <tr>
                            <td>{{ Str::replaceArray('backup/', [''], $backup) }}</td>
                            <td><a class="btn btn-info" href="{{ route('database.restore', Str::replaceArray('backup/', [''], $backup)) }}">
                                Restaurar
                            </a>
                            <a class="btn btn-danger" href="{{ route('database.delete', Str::replaceArray('backup/', [''], $backup)) }}">
                                Eliminar
                            </a>
                            <a class="btn btn-success" href="{{ route('database.download', Str::replaceArray('backup/', [''], $backup)) }}">
                                Download
                            </a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
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
    
    @include('partials.datatable')
@endsection
