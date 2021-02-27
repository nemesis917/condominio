@extends('AdminLTE.index')
@section('titulo')
Consultar empresa
@endsection
@section('css')

@endsection
@section('cabIzquierda')
<h1 class="m-0 text-dark">Datos de la empresa</h1>
@endsection

@section('cabDerecha')
<i class="far fa-building"> Datos de la empresa </i>
<i class="fas fa-angle-left"> Edificio  </i>
@endsection

@section('body')

<div class="container">
    <div class="row base">
      <div class="col-md-4 d-block d-sm-none">
        <div class="small-box bg-info"  data-toggle="modal" data-target="#registrarEmpresa" >
          <div class="inner">
            <h3>Agregar<br>Empresa</h3>
          </div>
          <div class="icon">
              <i class="fas fa-briefcase"></i>
          </div>
      </div>
      </div>
        <div class="col-md-8">
            <section class="content">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Cree o busque una empresa</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="consultarEmpresa" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                          <th>Empresa</th>
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
        <div class="col-md-4 d-none d-sm-block">
          <div class="small-box bg-info"  data-toggle="modal" data-target="#registrarEmpresa" >
            <div class="inner">
              <h3>Agregar<br>Empresa</h3>
            </div>
            <div class="icon">
                <i class="fas fa-briefcase"></i>
            </div>
        </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content bg-secondary">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar nombre de la empresa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('empresa.modificar') }}" class="form-group" method="POST">
          @csrf
          <label>Ingrese el nombre de la empresa</label>
          <input type="text" name="empresa" id="empresa" placeholder="Espere...." class="form-control" autocomplete="off" maxlength="80" required>
          <input type="hidden" name="data" id="data">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar ventana</button>
          <input type="submit" id="modificarForm" value="Modificar" class="btn btn-warning">
        </form>
      </div>
    </div>
  </div>
</div>

<form action="{{ route('empresa.guardar') }}" method="post" class="base">
  @csrf
  <div class="modal fade" id="registrarEmpresa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Registrar una nueva empresa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
                  <label for="empresa">Inguese el nombre de la empresa</label>
                  <input type="text"class="form-control" name="empresa" id="empresa" maxlength="80" placeholder="Ingrese el nombre de la empresa" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <input type="submit" id="guardar" value="Guardar" class="btn btn-primary">
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
@section('javascript')
<script src="{{ asset('system/empresa/js/empresa.js') }}"></script>
@endsection