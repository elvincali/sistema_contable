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
                <h2>Bitacora</h2>
            </div>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Operador</th>
                        <th>Accion</th>
                        <th>Descripcion</th>
                        <th>I.P.</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($bitacoras as $bitacora)
                        <tr>
                            @foreach ($bitacora as $value)
                                <td>{{$value}}</td>
                            @endforeach
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
