@extends('AdminLTE.index')
@section('titulo')
Consultar las viviendas
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
            <div class="form-group">
                <label for="">Seleccione una empresa</label>
                <select name="empresa" id="cargarEmpresa" class="form-control" required>
                    <option value="">Seleccione...</option>
                    @foreach ($empresa as $item)
                        <option value="{{ $item->id }}">{{ $item->empresa }}</option>
                    @endforeach
                </select>
                <label for="">Seleccione un edificio</label>
                <select name="cargarEdificio" id="cargarEdificio" class="form-control" required>
                    <option value="">Seleccione...</option>
                </select>
                <div class="row" style="margin-top: 8px;">
                    <div class="col-6">
                        <label for="">Numero del inmueble</label>
                        <input type="text" name="cargarNumeroInmueble" class="form-control" id="cargarNumeroInmueble">
                    </div>
                    <div class="col-6">
                        <label for="">Estado del inmueble</label>
                        <input type="text" name="cargarEstadoInmueble" class="form-control" id="cargarEstadoInmueble">
                    </div>
                </div>
                <label for="">Nombre de propietario</label>
                <input type="text" name="cargarNombrePropietario" class="form-control" id="cargarNombrePropietario">
                <label for="">Alicuota</label>
                <input type="text" name="cargarAlicuota" class="form-control" id="cargarAlicuota">
                <label for="">Gastos administración</label>
                <input type="text" name="cargarGastos" class="form-control" id="cargarGastos">
                <div class="row" style="margin-top: 8px;">
                    <div class="col-md-6">
                        <label for="">Teléfono habitación</label>
                        <input type="text" name="cargarTlfLocal" class="form-control" id="cargarNumeroInmueble">
                    </div>
                    <div class="col-md-6">
                        <label for="">Teléfono celular</label>
                        <input type="text" name="cargarTlfMovil" class="form-control" id="cargarEstadoInmueble">
                    </div>
                </div>
                <label for="">Correo electrónico</label>
                <input type="text" name="cargarCorreo" class="form-control" id="cargarCorreo">
                <div class="row" style="margin-top: 8px;">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-secondary  btn-lg btn-block" id="cargarFormulario" style="margin-top:8px; margin-button:8px;">Limpiar</button>
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-success  btn-lg btn-block" id="limpiarFormulario" style="margin-top:8px; margin-button:8px;">Cargar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <section class="content">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            LINEAS
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="consultarVivienda" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                          <th>Num.</th>
                          <th>Nombre</th>
                          <th>Apellido</th>
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
@endsection
@section('javascript')
<script src="{{ asset('system/vivienda/js/vivienda.js') }}"></script>
@endsection