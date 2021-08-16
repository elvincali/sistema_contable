@extends('layouts.layout')

@section('css')
    <link rel="stylesheet" href="/adminlte/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/adminlte/select2/select2.min.css">
    <link rel="stylesheet" href="/adminlte/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/adminlte/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="/adminlte/daterangepicker/daterangepicker.css">
@endsection

@section('contenido')
    <div class="row mb-2">
        <div class="col-12">
            <div class="row align-items-center">
                <h2>Reportes Personalizados</h2>
            </div>
            <form action="{{ route('reporte') }}" method="POST" enctype="multipart/form-data">
                <!--Método que permite ingresar datos-->
                @csrf
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Select2 (Default Theme)</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <select class="form-control" name="criterio">
                                        <option value="nombre_cliente">Nombre Cliente</option>
                                        <option value="num_cuenta">Num cuenta</option>
                                    </select>
                                </div>
                                <!-- /btn-group -->
                                <input type="text" class="form-control">
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label>Rango de Fecha:</label>
              
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <i class="far fa-calendar-alt"></i>
                                    </span>
                                  </div>
                                  <input type="text" name="date_range" class="form-control float-right" id="reservation">
                                </div>
                                <!-- /.input group -->
                              </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="select2-purple">
                                    <select class="select2" multiple="multiple" data-placeholder="Selecciona un tipo de Movimiento"
                                        data-dropdown-css-class="select2-purple" style="width: 100%;" name="movimiento[]">
                                        <option value="deposito">Deposito</option>
                                        <option value="retiro">Retiro</option>
                                        <option value="transaccion">Transaccion</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </div>
            </form>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Abreviacion</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @forelse ($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nombre }}</td>
                            <td>{{ $item->abreviacion }}</td>
                            <td></td>
                        </tr>
                    @empty 
                        <span>No  hay monedas creadas por el momento</span>
                    @endforelse --}}
                    @foreach ($items as $item)
                    <tr>
                        <td>{{ $item }}</td>
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
    <script src="/adminlte/select2/select2.full.min.js"></script>
    <script src="/adminlte/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/adminlte/jszip/jszip.min.js"></script>
    <script src="/adminlte/pdfmake/pdfmake.min.js"></script>
    <script src="/adminlte/pdfmake/vfs_fonts.js"></script>
    <script src="/adminlte/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/adminlte/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/adminlte/datatables-buttons/js/buttons.colVis.min.js"></script>
    {{-- <script src="/adminlte/daterangepicker/daterangepicker.js"></script> --}}
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()
            
            $('input[name="date_range"]').daterangepicker({
    opens: 'left'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
  });
        })
    </script>
    @role('admin')
    @include('partials.datatableAdmin')
@else
    @include('partials.datatable')
    @endrole
@endsection
