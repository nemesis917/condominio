@extends('AdminLTE.index')
@section('titulo')
Bienvenido al sistema
@endsection

@section('cabIzquierda')
<h1 class="m-0 text-dark">Cargar una empresa</h1>
@endsection

@section('cabDerecha')
<i class="far fa-building"> Empresa </i>
<i class="fas fa-angle-left"> Edificio  </i>
@endsection

@section('body')
<br>
<div class="container">
    <div class="row base">
        <div class="col-md-4">
            <a href="{{ route('empresa.consultar') }}">
                <div class="small-box bg-info">
                    <div class="inner">
                      <h3>Consultar las<br>empresas</h3>
      
                      <p>Empresas existentes: </p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>Datos de <br>edificios</h3>
  
                  <p>Edificios cargados: </p>
                </div>
                <div class="icon">
                    <i class="far fa-building"></i>
                </div>
            </div>

        </div>
        <div class="col-md-4">
            
            <div class="small-box bg-warning">
                <div class="inner">
                  <h3>Consultar<br>Viviendas</h3>
  
                  <p>Datos de las viviendas</p>
                </div>
                <div class="icon">
                    <i class="fas fa-house-user"></i>
                </div>
            </div>

        </div>
    </div>
    <div class="row base">
        <div class="col-md 6">
            <div class="card">
                <div class="card-header border-transparent">
                  <h3 class="card-title">Empresas registradas</h3>
  
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table m-0">
                      <thead>
                      <tr>
                        <th>Empresas</th>
                      </tr>
                      </thead>
                      <tbody>
                        @foreach ($empresa as $emp)
                        <tr>
                            <td>{{ $emp->empresa }}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                  <a href="javascript:void(0)"  data-toggle="modal" data-target="#registrarEmpresa"  class="btn btn-sm btn-info float-left">Registrar nueva empresa</a>
                  <a href="{{ route('empresa.consultar') }}" class="btn btn-sm btn-secondary float-right">Ver empresas</a>
                </div>
                <!-- /.card-footer -->
            </div>
        </div>
        <div class="col-md 6">
            <div class="card">
                <div class="card-header border-transparent">
                  <h3 class="card-title">Edificios</h3>
  
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table m-0">
                      <thead>
                      <tr>
                        <th>Conjunto residenciales</th>
                      </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td>Nombre del edificio</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                  <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">Ver edificios</a>
                </div>
                <!-- /.card-footer -->
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
              <input type="submit" value="Guardar" class="btn btn-primary">
            </div>
          </div>
        </div>
      </div>
</form>

  
  
@endsection