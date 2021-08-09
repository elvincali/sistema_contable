<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
        <a href="/inicio" class="navbar-brand">
            {{-- <img src="img/assets/logo.jpg" alt="AdminLTE Logo"
                class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
            <img src="/img/assets/logo.png" alt="50px" height="30px">
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        class="nav-link dropdown-toggle">Administracion</a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                        @can('ver moneda')
                            <li><a href="{{ route('monedas.index') }}" class="dropdown-item">Moneda</a></li>
                        @endcan
                        @can('ver sucursal')
                            <li><a href="{{ route('sucursales.index') }}" class="dropdown-item">Sucursal</a></li>
                        @endcan
                        @can('ver tipo cuenta')
                            <li><a href="{{ route('tipo-cuentas.index') }}" class="dropdown-item">Tipo de Cuenta</a></li>
                        @endcan
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        class="nav-link dropdown-toggle">Usuarios</a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                        @can('ver permiso')
                            <li><a href="{{ route('permisos', ['id'=>1]) }}" class="dropdown-item">Permisos</a></li>
                        @endcan
                        @can('ver rol')
                            <li><a href="{{ route('roles.index') }}" class="dropdown-item">Roles</a></li>
                        @endcan
                        @can('ver usuario')
                            <li><a href="{{ route('funcionarios.index') }}" class="dropdown-item">Usuario</a></li>
                        @endcan
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        class="nav-link dropdown-toggle">Cliente</a>
                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                        @can('ver cliente')
                            <li><a href="{{ route('clientes.index') }}" class="dropdown-item">Clientes</a></li>
                        @endcan
                        @can('ver cuenta')
                            <li><a href="{{ route('cuentas.index') }}" class="dropdown-item">Cuenta</a></li>
                        @endcan
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        class="nav-link dropdown-toggle">Movimiento</a>
                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                        @can('ver deposito')
                            <li><a href="{{ route('depositos.index') }}" class="dropdown-item">Depositos</a></li>
                        @endcan
                        @can('ver retiro')
                            <li><a href="{{ route('retiros.index') }}" class="dropdown-item">Retiros</a></li>
                        @endcan
                        @can('ver transaccion')
                            <li><a href="{{ route('transacciones.index') }}" class="dropdown-item">Transacciones</a></li>
                        @endcan
                    </ul>
                </li>
            </ul>

        </div>

        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <li class="nav-item">
                <a href="{{ route('salir') }}" class="nav-link text-danger">
                    {{ Auth::user()->nombre }}<i class="fas fa-sign-out-alt"></i>
                </a>
            </li>
        </ul>
    </div>
</nav>
<!-- /.navbar -->
