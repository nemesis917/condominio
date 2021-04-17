<center>
    <a href="{{ route('conf.usuario.consultar', $id) }}"><button class="edit btn btn-primary btn-sm" id="mostrarUsuarioSeleccionado" value="{{ $id }}" title="Consultar datos de este usuario"><i class="fas fa-user"></i></button></a>
    <button class="edit btn btn-warning btn-sm" id="modUsuario" value="{{ $id }}" title="Modificar datos de este usuario" data-toggle="modal" data-target="#modificarUsuario"><i class="fas fa-edit"></i></button>
    <button class="edit btn btn-danger btn-sm" id="desactivarUsuario" value="{{ $id }}" title="Desactivar este usuario"><i class="fas fa-user-slash"></i></button>
</center>