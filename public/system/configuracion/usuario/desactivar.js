$(document).ready(function(){

    $('#usuario-desactivado').DataTable({
        "ajax": 'usuarios-desactivados',
        columns: [
            { data: null, render: function ( data ) 
                { return data.name+' '+data.lastname;} 
            },
            {data: 'email'},
            {data: 'nivel_acceso'},
            {data: 'btn', orderable: false, searchable: false},
        ],
        "destroy": true,
        "language" : {
            url: '../../plugins/datatables/js/espanol.json'
        },
        "bLengthChange": false,
        "order": [[ 0, "desc" ]],
        "searching": true,
        "info": false
    });

    $(document).on('click', '#borrarUsuario', function(){
        Swal.fire({
            title: 'Esta seguro de eliminar al usuario?',
            text: "esta opción no se puede revertir!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar!',
            cancelButtonText: 'Cancelar!'
          }).then((result) => {
            if (result.value) {

                $.ajax({
                    type: "post",
                    url: "usuarios-eliminado",
                    data: { id: this.value },
                    dataType: "json",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function (resp) {
                        Swal.fire(
                            'Usuario eliminado!',
                            'Este usuario no puede ingresar al sistema',
                            'success'
                          )
                          $('#usuario-desactivado').DataTable().ajax.reload();
                    }, error: function(){
                        Swal.fire(
                            'No se pudo eliminar!',
                            'revise si aun quedan bienes relacionados!',
                            'error'
                          )
                    }
                });



            }
          })
    });

});