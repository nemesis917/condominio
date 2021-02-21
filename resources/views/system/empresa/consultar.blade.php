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
<i class="far fa-building"> Empresa </i>
<i class="fas fa-angle-left"> Edificio  </i>
@endsection

@section('body')
<script>
  Swal.fire(
      'ya funciona!',
      'no se porque se desactivo',
      'success'
  )
</script>
<div class="container">
    <div class="row base">
        <div class="col-md-6">
            <section class="content">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">DataTable with default features</h3>
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
        <div class="col-md-6"></div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content bg-secondary">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nombre de la empresa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('empresa.modificar') }}" class="form-group" method="POST">
          @csrf
          <label>Ingrese el nombre de la empresa</label>
          <input type="text" name="empresa" id="empresa" placeholder="Espere...." class="form-control" required>
          <input type="hidden" name="data" id="data">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar ventana</button>
          <input type="submit" value="Cambiar" class="btn btn-warning">
        </form>
      </div>
    </div>
  </div>
</div>
@if ($errors->any())
    <script>alert('hubo un error que no permite almacenar el nombre de la empresa')</script>
@endif
@if (session('mensaje'))
    @if (session('mensaje') == 1)
        <script>
            Swal.fire(
                'Solicitud procesada!',
                'Se ha cargado la información',
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
<script src="{{ asset('system/empresa/js/empresa.js') }}"></script>
@endsection