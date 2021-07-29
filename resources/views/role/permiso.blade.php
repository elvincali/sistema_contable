@extends('layouts.layout')

@section('css')
    <link rel="stylesheet" href="/adminlte/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/adminlte/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/adminlte/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('contenido')
    <div class="row mb-2">
        <div class="col-12">
            <h3>Lista de Permisos</h3>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permisos as $permiso)
                        <tr>
                            <td>{{ $permiso->id }}</td>
                            <td>{{ $permiso->name }}</td>
                            <td>{{ $permiso->guard_name }}</td>
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
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
