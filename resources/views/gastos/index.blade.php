@extends('AdminLTE.index')
@section('titulo')
Cargar gastos
@endsection
@section("css")
<script src="{{ asset('plugins/numeric/jquery.numeric.js') }}"></script>
@endsection
@section('cabIzquierda')
<h1 class="m-0 text-dark">Cargar gastos comunes y no comunes</h1>
@endsection

@section('cabDerecha')
<li class="breadcrumb-item">Configuración</li>
@endsection

@section('body')
<div class="container">
    <div class="row base">

          <div class="col-12 col-sm-3 col-md-3" data-toggle="modal" data-target="#cargar-gasto">
            <a href="#" style="color: black; text-decoration: none;">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-money-bill-wave-alt"></i></span>
    
                <div class="info-box-content">
                  <span class="info-box-number">Cargar</span>
                  <span class="info-box-text">
                    un gasto
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
            </a>
            <!-- /.info-box -->
          </div>

        <div class="col-12 col-sm-3 col-md-3">
          <div class="info-box">
            <span class="info-box-icon elevation-1" style="background: #d17224"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-number">Gastos comunes</span>
              <span class="info-box-text">
                {{ $comunes }}
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-3 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user"></i></span>

            <div class="info-box-content">
              <span class="info-box-number">Gastos no comunes</span>
              <span class="info-box-text">
              {{ $noComunes }}
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-3 col-md-3" data-toggle="modal" data-target="#gasto-masivo">
          <a href="#" style="color: black; text-decoration: none;">
            <div class="info-box">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-file-excel"></i></span>
  
              <div class="info-box-content">
                <span class="info-box-number">Carga de datos</span>
                <span class="info-box-text">mediante Excel </span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </a>
          <!-- /.info-box -->
        </div>

      </div>
    <div class="row base">
        <div class="col-md-12">
          <div class="card">

            <!-- /.card-header -->
            <div class="card-body">
              <table id="lista-gastos" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Row 1 Data 1</td>
                        <td>Row 1 Data 2</td>
                        <td>Row 1 Data 3</td>
                        <td>Row 1 Data 4</td>
                    </tr>
                    <tr>
                      <td>Row 1 Data 1</td>
                      <td>Row 1 Data 2</td>
                      <td>Row 1 Data 3</td>
                      <td>Row 1 Data 4</td>
                    </tr>
                </tbody>
            </table>
            </div>
            <!-- /.card-body -->
        </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="cargar-gasto" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Cargar gastos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('conf.gastos.cargar-unidad') }}" method="post">
          @csrf
          <div class="form-group">
            <label for="codigo">Ingrese el codigo del gasto</label>
            <input type="text" name="codigo" id="codigo" class="form-control" placeholder="Ingrese el codigo para este gasto" maxlength="5" pattern="[0-9]+" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="descripcion">Describa el gasto</label>
            <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Describa este gasto" maxlength="160" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="descripcion">Describa el gasto</label>
            <div class="custom-control custom-radio">
              <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio" value="gasto1" checked>
              <label for="customRadio1" class="custom-control-label">Gastos comunes</label>
            </div>
            <div class="custom-control custom-radio">
              <input class="custom-control-input" type="radio" id="customRadio2" name="customRadio" value="gasto2">
              <label for="customRadio2" class="custom-control-label">Gastos no comunes</label>
            </div> 
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" id="cargarUno" class="btn btn-primary">Cargar</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="gasto-masivo" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Carga de datos mediante EXCEL</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-align: justify;">
        <p>Si desea descargar la plantilla para la carga masiva de vienes comunes y no comunes, puede hacer la <a href="{{ url('downloads/cargar_gastos.xlsx') }}">descarga aqui</a> </p>
        <p>Cabe destacar que en el campo de la columna "Tipo de gastos" se debe de definir usando numeros de la siguiente manera. </p>
        <ul>
          <li>1 para Gastos comunes</li>
          <li>2 para gastos no comunes</li>
        </ul>
        No debe de escribirse debido a que se debe de mantener un estandar para las cargas masivas, y este campo en especifico podria generar gran confusión en los usuarios. <br>
        <br>
        <form action="{{ route('config.gastos.importar') }}" method="post" accept="application/xls, .xlsx" enctype="multipart/form-data" aria-placeholder="agregue archivo">
          @csrf
          <input type="file" name="file" id="carga" required>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <input type="submit" class="btn btn-primary" value="cargar masivamente">
            <br>
          </div>
        </form>
      </div>
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
    @elseif(session('mensaje') == 2)
        <script>
                Swal.fire(
                    'Hubo un error',
                    'La información no fue salvada',
                    'error'
                )
        </script>
    @elseif(session('mensaje') == 3)
        <script>
                Swal.fire(
                    'Se ha cargado',
                    'la información de manera masiva',
                    'success'
                )
        </script>
    @endif
@endif

@endsection
@section('javascript')
<script src="{{ asset('system/configuracion/gastos/inicio.js') }}"></script>
@endsection