@extends('AdminLTE.index')
@section('titulo')
Consultar las viviendas
@endsection
@section('css')
<script src="{{ asset('plugins/numeric/jquery.numeric.js') }}"></script>
@endsection
@section('cabIzquierda')
<h1 class="m-0 text-dark">Cargar datos de viviendas</h1>
@endsection

@section('cabDerecha')
<li class="breadcrumb-item">Inicio</li>
@endsection

@section('body')
<div class="container">
    <div class="row base">
        <div class="col-md-4">
            <form method="post">
                <div class="form-group">
                    <label for="">Seleccione una empresa</label>
                    <select name="empresa" id="cargarEmpresa" class="form-control" required>
                        <option value="">Seleccione...</option>
                        @foreach ($empresa as $item)
                            <option value="{{ $item->id }}">{{ $item->empresa }}</option>
                        @endforeach
                    </select>
                    <label for="">Seleccione un edificio</label>
                    <select name="cargarEdificio" id="cargarEdificio" class="form-control"  required>
                        <option value="">Seleccione...</option>
                    </select>
                    <div class="row" style="margin-top: 8px;">
                        <div class="col-6">
                            <label for="">Numero del inmueble</label>
                            <input type="text" name="cargarNumeroInmueble" class="form-control" placeholder="Número de vivienda" maxlength="10" id="cargarNumeroInmueble">
                        </div>
                        <div class="col-6">
                            <label for="">Estado del inmueble</label>
                            <input type="text" name="cargarEstadoInmueble" class="form-control" placeholder="Estado de vivienda" maxlength="3" id="cargarEstadoInmueble">
                        </div>
                    </div>
                    <label for="">Nombre de propietario</label>
                    <input type="text" name="cargarNombrePropietario" class="form-control" placeholder="Nombre del titular de la vivienda" maxlength="30" id="cargarNombrePropietario">
                    <label for="">Apellido de propietario</label>
                    <input type="text" name="cargarApellidoPropietario" class="form-control" placeholder="Apellido del titular de la vivienda" maxlength="30" id="cargarApellidoPropietario">
                    <label for="">Alicuota</label>
                    <input type="text" name="cargarAlicuota" class="form-control" placeholder="Indique el porcentaje" maxlength="14" id="cargarAlicuota">
                    <label for="">Gastos administración</label>
                    <input type="text" name="cargarGastos" class="form-control" placeholder="Indique sus onorarios profesionales" maxlength="12" id="cargarGastos">
                    <div class="row" style="margin-top: 8px;">
                        <div class="col-md-6">
                            <label for="">Teléfono habitación</label>
                            {{-- <input type="text" name="cargarTlfLocal" class="form-control" maxlength="12" id="cargarTlfHabitacion"> --}}
                            
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" name="cargarTlfLocal" class="form-control" placeholder="Número local" maxlength="11" id="cargarTlfHabitacion">
                            </div>


                        </div>
                        <div class="col-md-6">
                            <label for="">Teléfono celular</label>
                            {{-- <input type="text" name="cargarTlfMovil" class="form-control" maxlength="12" id="cargarTlfMovil"> --}}
                        
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-microphone"></i></span>
                                </div>
                                <input type="text" name="cargarTlfMovil" class="form-control" placeholder="Número móvil" maxlength="11" id="cargarTlfMovil">
                            </div>
                        
                        </div>
                    </div>
                    <label for="">Correo electrónico</label>
                    <input type="text" name="cargarCorreo" class="form-control" placeholder="ejemplo@ejemplo.com" maxlength="60" id="cargarCorreo">
                    <div class="row" style="margin-top: 8px;">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-secondary  btn-lg btn-block" maxlength="" id="limpiarFormulario" style="margin-top:8px; margin-button:8px;">Limpiar</button>
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-success  btn-lg btn-block" maxlength="" id="cargarFormulario" style="margin-top:8px; margin-button:8px;">Cargar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-12">
                    <div class="info-box bg-success">
                      <span class="info-box-icon"><i class="far fa-money-bill-alt"></i></span>
        
                      <div class="info-box-content">
                        <span class="info-box-text">ALICUOTA</span>
                        <span class="info-box-number" id="alic">0</span>
        
                        <div class="progress">
                          <div class="progress-bar" id="porcAli" style="width: 0%"></div>
                        </div>
                        <span class="progress-description">
                            &nbsp;
                        </span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-md-6 col-sm-6 col-12">
                    <div class="info-box bg-info">
                      <span class="info-box-icon"><i class="fa fa-home"></i></span>
        
                      <div class="info-box-content">
                        <span class="info-box-text">CANTIDAD DE VIVIENDAS</span>
                        <h2><span class="info-box-number" style="padding-top: 2px;"><div id="cantViv">0 viviendas</div></span></h2>
        
 

                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
            </div>
            <section class="content">
                <div class="card">

                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="consultarVivienda" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                          <th>Num.</th>
                          <th>Nombre completo</th>
                          <th>Acción</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
            </section>
        </div>
    </div>
</div>


<div class="modal fade" id="modificarVivienda" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modificar datos de vivienda</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <form action="{{ route('vivienda.update') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Seleccione una empresa</label>
                    <select name="empresaMod" id="cargarEmpresaMod" class="form-control" required>
                        <option value="">Seleccione...</option>
                        @foreach ($empresa as $item)
                            <option value="{{ $item->id }}">{{ $item->empresa }}</option>
                        @endforeach
                    </select>
                    <label for="">Seleccione un edificio</label>
                    <select name="cargarEdificioMod" id="cargarEdificioMod" class="form-control"  required>
                        <option value="">Seleccione...</option>
                    </select>
                    <div class="row" style="margin-top: 8px;">
                        <div class="col-6">
                            <label for="">Numero del inmueble</label>
                            <input type="text" name="cargarNumeroInmuebleMod" class="form-control" placeholder="Número de vivienda" maxlength="10" id="cargarNumeroInmuebleMod" required>
                        </div>
                        <div class="col-6">
                            <label for="">Estado del inmueble</label>
                            <input type="text" name="cargarEstadoInmuebleMod" class="form-control" placeholder="Estado de vivienda" maxlength="3" id="cargarEstadoInmuebleMod" required>
                        </div>
                    </div>
                    <label for="">Nombre de propietario</label>
                    <input type="text" name="cargarNombrePropietarioMod" class="form-control" placeholder="Nombre del titular de la vivienda" maxlength="30" id="cargarNombrePropietarioMod" required>
                    <label for="">Apellido de propietario</label>
                    <input type="text" name="cargarApellidoPropietarioMod" class="form-control" placeholder="Apellido del titular de la vivienda" maxlength="30" id="cargarApellidoPropietarioMod" required>
                    <label for="">Alicuota</label>
                    <input type="text" name="cargarAlicuotaMod" class="form-control" placeholder="Indique el porcentaje" maxlength="14" id="cargarAlicuotaMod" required>
                    <label for="">Gastos administración</label>
                    <input type="text" name="cargarGastosMod" class="form-control" placeholder="Indique sus onorarios profesionales" maxlength="12" id="cargarGastosMod" required>
                    <div class="row" style="margin-top: 8px;">
                        <div class="col-md-6">
                            <label for="">Teléfono habitación</label>                            
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" name="cargarTlfLocalMod" class="form-control" placeholder="Número local" maxlength="11" id="cargarTlfHabitacionMod" required>
                            </div>
            
            
                        </div>
                        <div class="col-md-6">
                            <label for="">Teléfono celular</label>
                          
                        
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fas fa-microphone"></i></span>
                                </div>
                                <input type="text" name="cargarTlfMovilMod" class="form-control" placeholder="Número móvil" maxlength="11" id="cargarTlfMovilMod" required>
                                <input type="hidden" name="idMax" id="hiddena" required>
                                <input type="hidden" name="idEmp" id="hiddenb" required>
                                <input type="hidden" name="idEdf" id="hiddenc" required>
                            </div>
                        
                        </div>
                    </div>
                    <label for="">Correo electrónico</label>
                    <input type="email" name="cargarCorreoMod" class="form-control" placeholder="ejemplo@ejemplo.com" maxlength="60" id="cargarCorreoMod">

                </div>

        </div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-secondary btn-lg btn-block" data-dismiss="modal">Close</button> --}}
                <button type="button" data-dismiss="modal" class="btn btn-secondary  btn-lg "  style="margin-top:8px; margin-button:8px;">Cerrar</button>
                <input type="submit" class="btn btn-warning  btn-lg " maxlength="" id="cargarFormularioMod" style="margin-top:8px; margin-button:8px;" value="Modificar">
            </div>

            {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </form>
    </div>
    </div>
  </div>

@if (session('mensaje'))
    @if (session('mensaje') == 1)
        <script>
                Swal.fire(
                'Solicitud procesada!',
                'Se ha atendido su solicitud satisfactoriamente',
                'success'
                )
        </script>
    @else
        <script>
                Swal.fire(
                    'Hubo un error',
                    'La información no fue salvada',
                    'error'
                )
        </script>
    @endif
@endif








@endsection
@section('javascript')
<script src="{{ asset('system/vivienda/js/vivienda.js') }}"></script>
@endsection