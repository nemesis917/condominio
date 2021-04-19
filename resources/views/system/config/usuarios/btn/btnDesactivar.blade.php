<center>
    <a href="{{ route('conf.usuario.consultar', $id) }}"><button class="edit btn btn-primary btn-sm" id="mostrarUsuarioSeleccionado" value="{{ $id }}" title="Consultar datos de este usuario"><i class="fas fa-user"></i></button></a>
    <button class="edit btn btn-danger btn-sm" id="borrarUsuario" value="{{ $id }}" title="Eliminar a este usuario"><i class="fas fa-dumpster"></i></button>
</center>