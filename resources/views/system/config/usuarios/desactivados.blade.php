@extends('AdminLTE.index')
@section('titulo')
Bienvenido al sistema
@endsection

@section('cabIzquierda')
<h1 class="m-0 text-dark">Bienvenido al sistema</h1>
@endsection

@section('cabDerecha')
<li class="breadcrumb-item">Inicio</li>
@endsection

@section('body')
<div class="container">
    <div class="row base">
        <div class="col-md-4">1</div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Usuarios en estado desactivado</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="usuario-desactivado" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Correo</th>
                      <th>Nivel acceso</th>
                      <th style="min-width: 150px">Acción</th>
                    </tr>
                    </thead>
                    <tbody>
      
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
    <script src="{{ asset('system/configuracion/usuario/desactivar.js') }}"></script>
@endsection