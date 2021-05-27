@extends('AdminLTE.index')
@section('titulo')
Configuración del sistema
@endsection

@section('cabIzquierda')
<h1 class="m-0 text-dark">Configuración</h1>
@endsection

@section('cabDerecha')
<li class="breadcrumb-item">Configuración</li>
@endsection

@section('body')
<div class="container">
    <div class="row base">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-12">
                    <h5>Carga de gastos comunes y no comunes</h5>
                    <a href="{{ route('conf.gastos.index') }}"><button class="btn btn-primary">Seleccione</button></a>
                    <br>
                    <hr>
                </div>
                <div class="col-md-12">
                    <h5>Datos de usuarios</h5>
                    <a href="{{ route('conf.usuario.index') }}"><button class="btn btn-primary">Seleccione</button></a>
                    <br>
                    <hr>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
@endsection