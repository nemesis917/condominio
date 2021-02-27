@extends('AdminLTE.index')
@section('titulo')
Bienvenido al sistema
@endsection
@section('css')
<script src="{{ asset('plugins/numeric/jquery.numeric.js') }}"></script>
@endsection
@section('cabIzquierda')
<h1 class="m-0 text-dark">Opciones del edificio</h1>
@endsection

@section('cabDerecha')
<i class="far fa-building"> Datos de edificios </i>
<i class="fas fa-angle-left"> Edificio  </i>
@endsection

@section('body')
<div class="container">
    <div class="row base">
        <div class="col-md-4">
            <div class="small-box bg-success" data-toggle="modal" data-target="#registrarEdificio">
                <div class="inner">
                    <h3>Agregar un <br>edificio</h3>
                </div>
                <div class="icon">
                    <i class="far fa-building"></i>
                </div>
            </div>        
        </div>
        <div class="col-md-8">
            <section class="content">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Cree o busque un edificio</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="consultarEdificio" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                          <th style="min-width: 80%;">Edificio</th>
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

<form action="{{ route('edificio.guardar') }}" method="post" class="base">
  @csrf
  <div class="modal fade" id="registrarEdificio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar un edificio</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="empresa">Seleccione ls empresa</label>
              <select name="empresa" id="empresa" class="form-control">
                <option value="">Seleccione...</option>
                @foreach ($empresa as $emp)
                  <option value="{{ $emp->id }}">{{ $emp->empresa }}</option>
                @endforeach
              </select>
              <label for="empresa">Codigo del edificio</label>
              <input type="text" class="form-control" name="codigoE" id="codigoE" maxlength="3" placeholder="Ingrese el código del edificio" required>
              <label for="empresa">Nombre del edificio</label>
              <input type="text"class="form-control" name="nombreE" id="nombreE" maxlength="100" placeholder="Ingrese el nombre del edificio" required>
              <label for="empresa">Código del gerente</label>
              <input type="text"class="form-control" name="codigoG" id="codigoG" maxlength="3" placeholder="Ingrese el código del gerente" required>
              <label for="empresa">Honorarios por edificio</label>
              <input type="text"class="form-control" name="honorarios" id="honorarios" maxlength="13" placeholder="Ingrese sus honorarios a cobrar por edificio" required>
              <label for="empresa">Indique la ubicación</label>
              <input type="text"class="form-control" name="ubicacion" id="ubicacion" maxlength="30" placeholder="Ingrese la ubicación del conjunto residencial" required>
              <label for="empresa">Dirección</label>
              <input type="text"class="form-control" name="direccion" id="direccion" maxlength="200" placeholder="Ingrese la direccion fiscal del edificio" required>
              <label for="empresa">Código postal</label>
              <input type="text"class="form-control" name="postal" id="postal" maxlength="4" placeholder="Ingrese el código postal" required>
              <label for="empresa">Porcentaje fondo de reserva</label>
              <input type="text"class="form-control" name="reserva" id="reserva" maxlength="6" placeholder="Ingrese el porcentaje, recuerde usar los dos decimales" required>
              <label for="empresa">Porcentaje intereses morosos</label>
              <input type="text"class="form-control" name="morosos" id="morosos" maxlength="6" placeholder="Ingrese el porcentaje, recuerde usar los dos decimales" required>
              <label for="empresa">Porcentaje del IVA</label>
              <input type="text"class="form-control" name="iva" id="iva" maxlength="6" placeholder="Ingrese el IVA, recuerde usar los dos decimales" required>
              <label for="empresa">Porcentaje comición cheque devuelto</label>
              <input type="text"class="form-control" name="cheque" id="cheque" maxlength="6" placeholder="Ingrese el porcentaje, recuerde usar los dos decimales" required>
              <label for="empresa">Comentario</label>
              <input type="text"class="form-control" name="comentario" id="comentario" maxlength="200" placeholder="Opcionalmente puede escribir un comentario" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <input type="submit" value="Guardar" class="btn btn-primary">
          </div>
        </div>
      </div>
    </div>
</form>

@if ($errors->any())
    <script>alert('hubo un error que no permite almacenar el nombre de la empresa')</script>
@endif

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
        'Se guardo la información',
        'pero un error interno evito que guardara en la tabla relacional',
        'warning'
      )
      </script>
    @elseif(session('mensaje') == 3)
    <script>
        Swal.fire(
            'Hubo un error',
            'La información no fue salvada',
            'error'
        )
    </script>
    @endif
@endif


<form method="post" class="base">
  @csrf
  <div class="modal fade" id="modificarEdificio" tabindex="-1" aria-labelledby="modificarEdificio" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">1-Modificar datos del edificio</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="empresa">Seleccione ls empresa</label>
              <select name="empresa" id="empresa-mod" class="form-control" required>
              </select>
              <label for="empresa">Codigo del edificio</label>
              <input type="text" class="form-control" name="codigoE" id="codigoE-mod" maxlength="3" placeholder="Ingrese el código del edificio" required>
              <label for="empresa">Nombre del edificio</label>
              <input type="text"class="form-control" name="nombreE" id="nombreE-mod" maxlength="100" placeholder="Ingrese el nombre del edificio" required>
              <label for="empresa">Código del gerente</label>
              <input type="text"class="form-control" name="codigoG" id="codigoG-mod" maxlength="3" placeholder="Ingrese el código del gerente" required>
              <label for="empresa">Honorarios por edificio</label>
              <input type="text"class="form-control" name="honorarios" id="honorarios-mod" maxlength="14" placeholder="Ingrese sus honorarios a cobrar por edificio" required>
              <label for="empresa">Indique la ubicación</label>
              <input type="text"class="form-control" name="ubicacion" id="ubicacion-mod" maxlength="30" placeholder="Ingrese la ubicación del conjunto residencial" required>
              <label for="empresa">Dirección</label>
              <input type="text"class="form-control" name="direccion" id="direccion-mod" maxlength="200" placeholder="Ingrese la direccion fiscal del edificio" required>
              <label for="empresa">Código postal</label>
              <input type="text"class="form-control" name="postal" id="postal-mod" maxlength="4" placeholder="Ingrese el código postal" required>
              <label for="empresa">Porcentaje fondo de reserva</label>
              <input type="text"class="form-control" name="reserva" id="reserva-mod" maxlength="6" placeholder="Ingrese el porcentaje, recuerde usar los dos decimales" required>
              <label for="empresa">Porcentaje intereses morosos</label>
              <input type="text"class="form-control" name="morosos" id="morosos-mod" maxlength="6" placeholder="Ingrese el porcentaje, recuerde usar los dos decimales" required>
              <label for="empresa">Porcentaje del IVA</label>
              <input type="text"class="form-control" name="iva" id="iva-mod" maxlength="6" placeholder="Ingrese el iva" required>
              <label for="empresa">Porcentaje comición cheque devuelto</label>
              <input type="text"class="form-control" name="cheque" id="cheque-mod" maxlength="6" placeholder="Ingrese el porcentaje, recuerde usar los dos decimales" required>
              <label for="empresa">Comentario</label>
              <input type="text"class="form-control" name="comentario" id="comentario-mod" maxlength="200" placeholder="Opcionalmente puede escribir un comentario" required>
              <input type="hidden" name="data">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" id="submit" class="btn btn-warning">Modificar</button>
          </div>
        </div>
      </div>
    </div>
</form>



@endsection
@section('javascript')
<script src="{{ asset('system/edificio/js/edificio.js') }}"></script>

@endsection