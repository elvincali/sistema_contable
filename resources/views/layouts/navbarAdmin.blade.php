        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <li class="nav-item">
                <a href="{{ route('salir') }}" class="nav-link text-danger">
                    Salir <i class="fas fa-sign-out-alt"></i>
                </a>
            </li>
        </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="{{ asset('img/assets/logo.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Banco Union S.A.</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('img/funcionario/admin.jpg') }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Administrador</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item {{(Request::is('administracion/*')? 'menu-open' : '') }}">
                            <a href="#" class="nav-link {{(Request::is('administracion/*')? 'active' : '') }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Administracion
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('monedas.index') }}" class="nav-link {{ (Request::is('administracion/monedas')? 'active' : '') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Moneda</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('sucursales.index') }}" class="nav-link {{ (Request::is('administracion/sucursales')? 'active' : '') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Sucursal</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('tipo-cuentas.index') }}" class="nav-link {{ (Request::is('administracion/tipo-cuentas')? 'active' : '') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tipo Cuenta</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item {{(Request::is('usuario/*')? 'menu-open' : '') }}">
                            <a href="#" class="nav-link {{(Request::is('usuario/*')? 'active' : '') }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Usuario
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('permisos') }}" class="nav-link {{ (Request::is('usuario/permisos')? 'active' : '') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Permisos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('roles.index') }}" class="nav-link {{ (Request::is('usuario/roles')? 'active' : '') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Roles</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('funcionarios.index') }}" class="nav-link {{ (Request::is('usuario/funcionarios')? 'active' : '') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Funcionario</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item {{(Request::is('cliente/*')? 'menu-open' : '') }}">
                            <a href="#" class="nav-link {{(Request::is('cliente/*')? 'active' : '') }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Cliente
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('clientes.index') }}" class="nav-link {{ (Request::is('cliente/clientes')? 'active' : '') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Clientes</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('cuentas.index') }}" class="nav-link {{ (Request::is('cliente/cuentas')? 'active' : '') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Cuentas</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item {{(Request::is('transaccion/*')? 'menu-open' : '') }}">
                            <a href="#" class="nav-link {{(Request::is('transaccion/*')? 'active' : '') }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Movimientos
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('transacciones.index') }}" class="nav-link {{ (Request::is('transaccion/transacciones')? 'active' : '') }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Transacciones</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('reporte') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Reportes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('database.index') }}" class="nav-link {{ (Request::is('backups')? 'active' : '') }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Database</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('bitacora') }}" class="nav-link {{ (Request::is('bitacora')? 'active' : '') }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Bitacora</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Configuracion</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->
