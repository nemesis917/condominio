@extends('AdminLTE.index')
@section('titulo')
Configuración de usuarios
@endsection

@section('cabIzquierda')
<h1 class="m-0 text-dark">Configuracion de usuarios</h1>
@endsection

@section('cabDerecha')
    <i class="fas fa-user-check nav-icon"> Configuracion de usuarios </i>
    <i class="fas fa-angle-left"> usuarios  </i>
    <i class="fas fa-angle-left"> Configuracion  </i>
@endsection

@section('body')
<div class="container">
    <div class="row base">
        <div class="col-md-4">
            <a href="{{ route('edificio.index') }}">
                <div class="small-box bg-success">
                  <div class="inner">
                      <h3>Crear<br>nuevo usuario</h3>
    
                  </div>
                  <div class="icon">
                      <i class="fas fa-user-check"></i>
                  </div>
              </div>        
            </a>
        </div>
        <div class="col-md-4">2</div>
        <div class="col-md-4">3</div>
    </div>
</div>
@endsection
@section('javascript')
    <script src="{{ asset('system/configuracion/usuario/usuarios.js') }}"></script>
@endsection