@extends('AdminLTE.index')
@section('titulo')
Bienvenido al sistema
@endsection
@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
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
        <div class="col-md-1"></div>
        <div class="col-md-4">
            <div class="card card-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header text-white"
                     style="background: url('{{ url('images/perfil1.png') }}') center center;">
                  <h3 class="widget-user-username text-right">{{ $user[0]->name }} {{ $user[0]->lastname }}</h3>
                  <h5 class="widget-user-desc text-right">{{ $user[0]->email }}</h5>
                </div>
                <div class="widget-user-image">
                  <img class="img-circle" src="{{ url('images/icono-usuario.png') }}" alt="User Avatar">
                </div>
                <div class="card-footer">
                  <div class="row">
                    <div class="col-sm-6 border-right">
                      <div class="description-block">
                        <h5 class="description-header">Propiedades</h5>
                        <span class="description-text">{{ count($user) }}</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6 border-right">
                      <div class="description-block">
                        <h5 class="description-header">Nivel de acceso</h5>
                        <span class="description-text">{{ $user[0]->nivel_acceso }}</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
            </div>
            <a href="{{ route('conf.usuario.index') }}"><button class="btn btn-primary btn-lg btn-block"><i class="bi bi-arrow-bar-left"></i> Regresar</button></a>
        </div>
        <div class="col-md-6">
        @if ( $user[0]->direccion && $user[0]->edificio_id )
          @foreach ($user as $usuario)
          <div class="card card-solid">
              <div class="card-body pb-0">
                  <div class="row d-flex align-items-stretch">
                      <div class="col-12 d-flex align-items-stretch">
                          <div class="card-body pt-0">
                          <div class="row">
                              <div class="col-12">
                              <h2 class="lead"><b>Propietario: </b> {{ $usuario->nombre }} {{ $usuario->apellido }} </h2>
                              <div class="text-muted text-sm"><b>Vivienda: </b> {{ $usuario->empresa }} </div>
                              <div class="text-muted text-sm"><b>Vivienda: </b> {{ $usuario->nombre_edificio }} </div>
                              <div class="text-muted text-sm"><b>Número de vivienda: </b> {{ $usuario->num_inmueble }} </div>
                              <ul class="ml-4 mb-0 fa-ul text-muted">
                                  <li class="small"><span class="fa-li"><i class="bi bi-building"></i></span><b>Dirección: </b>{{ $usuario->direccion }} </li>
                                  <li class="small"><span class="fa-li"><i class="bi bi-telephone"></i></span> <b>Teléfono local: </b>{{ $usuario->tlf_habitacion }} </li>
                                  <li class="small"><span class="fa-li"><i class="bi bi-phone"></i></span> <b>Teléfono móvil: </b>{{ $usuario->tlf_oficina }} </li>
                              </ul>
                              </div>
                          </div>
                          </div>
                          <div class="card-footer" style="background: #351fb1">
                              <div class="text-right">

                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          @endforeach
          @else
            <center>Este usuario no cuenta con una propiedad</center>
          @endif
        </div>
        <div class="col-md-1"></div>
    </div>
</div>

@if (session('mensaje'))
    @if (session('mensaje') == 1)
      <script>
          Swal.fire(
            'Se ha atendido',
            'la solicitud satisfactoriamente',
            'success'
          )
      </script>
    @else
      <script>
          Swal.fire(
            'Hubo un problema',
            'No se pudo realizar la modificacion',
            'error'
          )
      </script>
    @endif
@endif
@endsection