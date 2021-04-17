@extends('AdminLTE.index')
@section('titulo')
Configuración de usuarios
@endsection

@section('cabIzquierda')
<h1 class="m-0 text-dark">Configuracion de usuarios</h1>
@endsection

@section('cabDerecha')
    <i class="fas fa-user-check nav-icon"> Configuracion de usuarios </i>
    <i class="fas fa-angle-left"> usuarios  </i>
    <i class="fas fa-angle-left"> Configuracion  </i>
@endsection

@section('body')
<div class="container">
    <div class="row base">
        <div class="col-md-4">
            <div class="small-box bg-success" data-toggle="modal" data-target="#crearUsuario">
                <div class="inner">
                    <h3>Crear<br>nuevo usuario</h3>

                </div>
                <div class="icon">
                    <i class="fas fa-user-check"></i>
                </div>
            </div>       
        </div>
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Usuarios del sistema</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="lista-usuario" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Correo</th>
                  <th>Nivel acceso</th>
                  <th style="min-width: 150px">Acción</th>
                </tr>
                </thead>
                <tbody>
  
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
    </div>

</div>



<div class="modal fade" id="crearUsuario" tabindex="-1" aria-labelledby="crearUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="crearUsuarioLabel">Creación un usuarios</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('conf.usuario.guardar') }}" method="post"  autocomplete="off">
                @csrf
                <div class="form-group">
                    <label>Ingrese su nombre</label>
                    <input type="text" class="form-control" name="name" placeholder="Ingrese el nombre del usuario" id="name" required maxlength="60">
                    <label>Ingrese su apellido</label>
                    <input type="text" class="form-control" name="lastname" placeholder="Ingrese el apellido del usuario" id="lastname" required maxlength="60">
                    <label>Ingrese su correo</label>
                    <input type="text" class="form-control" name="email" placeholder="ejemplo@ejemplo" id="email" required maxlength="60">
                    <label>Ingrese su contraseña</label>
                    <input type="password" class="form-control" name="password" placeholder="mínimo 5 caracteres" id="password" required maxlength="60">
                    <label>Indique su nivel de acceso</label>
                    <select name="level" id="level"  class="form-control" required>
                        <option value="">Seleccione...</option>
                        <option value="propietario">Propietario</option>
                        <option value="administrador">Administrador</option>
                    </select>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <input type="submit" id="registrar" class="btn btn-primary" value="Guardar cambios">
                    </div>
                </div>
          </form>
        </div>
      </div>
    </div>
</div>


<div class="modal fade" id="modificarUsuario" tabindex="-1" aria-labelledby="modificarUsuarioLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modificarUsuarioLabel">Modificar un usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('conf.usuario.modificar') }}" method="post" autocomplete="off">
              @csrf
              <div class="form-group">
                  <label>Ingrese su nombre</label>
                  <input type="text" class="form-control name" name="name" placeholder="Ingrese el nombre del usuario" id="name" required maxlength="60">
                  <label>Ingrese su apellido</label>
                  <input type="text" class="form-control lastname" name="lastname" placeholder="Ingrese el apellido del usuario" id="lastname" required maxlength="60">
                  <label>Ingrese su correo</label>
                  <input type="text" class="form-control email" name="email" placeholder="ejemplo@ejemplo" id="email" required maxlength="60">
                  <label>Ingrese su contraseña</label>
                  <input type="password" class="form-control password" name="password" placeholder="Requiere nueva contraseña" id="password" required maxlength="60">
                  <br>
                  <div class="form-group">
                    <div class="custom-control custom-switch">
                      <input type="checkbox" name="check" class="custom-control-input customSwitch1" id="customSwitch1">
                      <label class="custom-control-label" for="customSwitch1">indique si desea (en caso de existir) los vienes asociados al correo del propietario anterior</label>
                    </div>
                  </div>
                  <label>Indique su nivel de acceso</label>
                  <select name="level" id="level"  class="form-control level" required>
                      <option value="">Seleccione...</option>
                      <option value="propietario">Propietario</option>
                      <option value="administrador">Administrador</option>
                  </select>
                  <input type="hidden" name="data" id="data">
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                      <input type="submit" id="modificar" class="btn btn-primary modificar" value="Modificar usuario">
                  </div>
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
    <script src="{{ asset('system/configuracion/usuario/usuarios.js') }}"></script>
@endsection