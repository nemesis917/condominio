<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('titulo', 'Sistema administrativo')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- jQuery -->
  <script src="{{ asset('layout/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Datatables -->
  <link rel="stylesheet" href="{{ asset('layout/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('layout/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
   <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('layout/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('layout/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('layout/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('layout/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('layout/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('layout/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('layout/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('layout/plugins/summernote/summernote-bs4.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{ asset('system/fonts/fuente.css') }}?family=Source+Sans+Pro:300,400,400i,700">
  @yield('css')
  <link rel="stylesheet" href="{{ asset('system/base.css') }}">
  <script src="{{ asset('plugins/sweetalert/js/sweetAlert.js') }}"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ url('web/assets/img/logo/logo_rg.png') }}" style="opacity: .8">
      <span class="brand-text font-weight-left">&nbsp;</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          
        </div>
        <div class="info">
          <a href="#" class="d-block">{{  \Auth::user()->name }} {{  \Auth::user()->lastname }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2" style="padding-bottom: 100px;">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="{{ route('dashboard') }}" class="nav-link">
              <i class="nav-icon fas fa-h-square"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview {{ ! Route::is('empresa.index') ?: 'menu-open' }} {{ ! Route::is('empresa.consultar') ?: 'menu-open' }} {{ ! Route::is('edificio.index') ?: 'menu-open' }} {{ ! Route::is('vivienda.index') ?: 'menu-open' }}">
            <a href="" class="nav-link {{ ! Route::is('empresa.index') ?: 'active' }} {{ ! Route::is('empresa.consultar') ?: 'active' }} {{ ! Route::is('edificio.index') ?: 'active' }} {{ ! Route::is('vivienda.index') ?: 'active' }}">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Viviendas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('empresa.index') }}" class="nav-link {{ ! Route::is('empresa.index') ?: 'active' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inicio viviendas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('empresa.consultar') }}" class="nav-link {{ ! Route::is('empresa.consultar') ?: 'active' }}">
                  <i class="fas fa-briefcase nav-icon text-primary"></i>
                  <p>Cargar empresa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('edificio.index') }}" class="nav-link {{ ! Route::is('edificio.index') ?: 'active' }}">
                  <i class="far fa-building nav-icon text-success"></i>
                  <p>Cargar edificios</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('vivienda.index') }}" class="nav-link {{ ! Route::is('vivienda.index') ?: 'active' }}">
                  <i class="fas fa-laptop-house nav-icon text-warning"></i>
                  <p>cargar apartamentos</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-h-square"></i>
              <p>
                Menu desplegable
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link {{ ! Route::is('empresa.index') ?: 'active' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Datos 1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link {{ ! Route::is('empresa.consultar') ?: 'active' }}">
                  <i class="far fa-circle nav-icon text-primary"></i>
                  <p>Cargar 2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link {{ ! Route::is('edificio.index') ?: 'active' }}">
                  <i class="far fa-circle nav-icon text-success"></i>
                  <p>Cargar 3</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-header">Ajustes</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Configuración
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview {{ ! Route::is('conf.usuario.index') ?: 'menu-open' }}">
            <a href="" class="nav-link {{ ! Route::is('conf.usuario.index') ?: 'active' }}">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Usuarios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview {{ ! Route::is('conf.usuario.index') ?: 'menu-open' }}">
              <li class="nav-item">
                <a href="{{ route('conf.usuario.index') }}" class="nav-link {{ ! Route::is('conf.usuario.index') ?: 'active' }}">
                  <i class="fas fa-user-check nav-icon"></i>
                  <p>Datos de usuarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link {{ ! Route::is('empresa.consultar') ?: 'active' }}">
                  <i class="far fa-circle nav-icon text-primary"></i>
                  <p>Cargar 2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link {{ ! Route::is('edificio.index') ?: 'active' }}">
                  <i class="far fa-circle nav-icon text-success"></i>
                  <p>Cargar 3</p>
                </a>
              </li>

            </ul>
          </li>
          {{-- cerrar sesion inicio --}}
          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="far fa-arrow-alt-circle-left nav-icon" style="color: #e61010"></i>
              <p style="color: #e61010">
                Cerrar sesión
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            @yield('cabIzquierda')
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              @yield('cabDerecha')
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    @yield('body')
    @include('sweet::alert')
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021 - {{ date('Y') }} Todos los derechos reservados.</strong>
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('layout/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('layout/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('layout/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
{{-- <script src="{{ asset('layout/plugins/sparklines/sparkline.js') }}"></script> --}}
<!-- Datatables JS -->
<script src="{{ asset('layout/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('layout/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('layout/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('layout/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('layout/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('layout/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('layout/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('layout/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('layout/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('layout/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('layout/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('layout/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('layout/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="{{ asset('layout/dist/js/pages/dashboard.js') }}"></script> --}}
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('layout/dist/js/demo.js') }}"></script>



@yield('javascript')
</body>
</html>
