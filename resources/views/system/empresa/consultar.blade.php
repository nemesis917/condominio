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
                      <table id="example1" class="table table-bordered table-hover">
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
@endsection
@section('javascript')
<script src="{{ asset('system/empresa/js/empresa.js') }}"></script>
@endsection