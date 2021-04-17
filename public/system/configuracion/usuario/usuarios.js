$(document).ready( function(){

    $('#mostrarUsuarioSeleccionado').on('click', function(){

    });

    $('#lista-usuario').DataTable({
        "ajax": 'lista-usuarios',
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

    $('#registrar').attr("disabled", true);

    $('#email').on('change', function(){
        $.ajax({
            url: '../../user-validate',
            type: 'POST',
            dataType: 'json',
            data: { id: $('#email').val() },
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        }).done(function(comp) {

            switch (comp) {
                case 2:
                Swal.fire(
                    'El correo ',
                    'ya esta registrado!',
                    'error'
                )
                $('#name').attr("disabled", false);
                $('#lastname').attr("disabled", false);
                $('#password').attr("disabled", false);
                $('#oldPassword').attr("disabled", false);
                $('#level').attr("disabled", false);
                $('#registrar').attr("disabled", false);
                break;
                case 3:
                Swal.fire(
                    'El correo',
                    'aun no tiene el acceso autorizado',
                    'error'
                )
                $('#name').attr("disabled", true);
                $('#lastname').attr("disabled", true);
                $('#password').attr("disabled", true);
                $('#oldPassword').attr("disabled", true);
                $('#level').attr("disabled", true);
                $('#registrar').attr("disabled", true);
                break;
                default:
                    Swal.fire(
                        'Hubo un error descocnocido',
                        'Contacte al departamento encargado',
                        'error'
                    )
            }
        })

    });

    $('#name, #lastname, #email, #password').on('change', function(){
        if ( $('#name').val() == "" || $('#lastname').val() == "" || $('#email').val() == "" || $('#password').val() == "" || $('#password_confirmation').val() == ""  ) {
            $('#registrar').attr("disabled", true);
        } else {
            $('#registrar').attr("disabled", false);
        }
    })

    $('#password').on('change', function(){
        let x = $('#password').val();
        if(x.length < 7){
            Swal.fire(
                'La clave es muy corta',
                'se requiere que la clave sea mas extensa',
                'error'
            )
            $('#registrar').attr("disabled", true);
        } else {
            $('#registrar').attr("disabled", false);
        }
    });

    $(document).on('click', '#modUsuario', function(){
        
        $.ajax({
            type: "POST",
            url: "modificar-usuarios",
            data: {id: $(this).val() },
            dataType: "JSON",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function (res) {
                $(".name").val("espere...");
                $(".lastname").val("espere...");
                $(".email").val("espere...");
                $(".password").val("espere...");
                $(".level").attr("disabled", true);

                $(".name").val(res.name);
                $(".lastname").val(res.lastname);
                $(".email").val(res.email);
                $(".password").val("");
                $(".level").attr("disabled", false);
                $(".level").val(res.nivel_acceso);
                $("#data").val(res.id);



            }
        });


    });


    $('.email').on('change', function(){

        $('.name').attr("disabled", false);
        $('.lastname').attr("disabled", false);
        $('.password').attr("disabled", false);
        $('.oldPassword').attr("disabled", false);
        $('.level').attr("disabled", false);
        $('.customSwitch1').attr("disabled", false);

        $.ajax({
            url: '../../user-validate',
            type: 'POST',
            dataType: 'json',
            data: { id: $('.email').val() },
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        }).done(function(comp) {

            switch (comp) {
                case 2:
                Swal.fire(
                    'El correo ',
                    'ya esta registrado!',
                    'error'
                )
                $('.name').attr("disabled", true);
                $('.lastname').attr("disabled", true);
                $('.password').attr("disabled", true);
                $('.oldPassword').attr("disabled", true);
                $('.level').attr("disabled", true);
                $('.modificar').attr("disabled", true);
                break;
                case 3:
                Swal.fire(
                    'El correo',
                    'aun no tiene el acceso autorizado',
                    'error'
                )
                $('.name').attr("disabled", true);
                $('.lastname').attr("disabled", true);
                $('.password').attr("disabled", true);
                $('.password').attr("disabled", true);
                $('.level').attr("disabled", true);
                $('.modificar').attr("disabled", true);
                $('.customSwitch1').attr("disabled", true);
                break;
                default:
                    $('.name').attr("disabled", false);
                    $('.lastname').attr("disabled", false);
                    $('.password').attr("disabled", false);
                    $('.oldPassword').attr("disabled", false);
                    $('.level').attr("disabled", false);
                    $('.customSwitch1').attr("disabled", false);
                    $('.modificar').attr("disabled", false);
            }
        })
    });

    $(document).on('click', '#desactivarUsuario', function(){
        let val = this.value;
        Swal.fire({
            title: '¿Esta usted seguro',
            text: "que desea desactivar a este ususario?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, desactivar!',
            cancelButtonText: 'Cancelar'
          }).then((result) => {
            if (result.value) {

                $.ajax({
                    url: 'desactivarUsuario',
                    type: 'POST',
                    dataType: 'json',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {id: val},
                    success: function (response) {
                        if (response) {
                            $('#lista-usuario').DataTable().ajax.reload();
                            Swal.fire(
                                'Desactivado!',
                                'Se a desactivado el acceso a este usuario.',
                                'success'
                              )
                        } else {
                            Swal.fire(
                                'Error!',
                                'Hubo un error, por favor comuniquese con el administrador.',
                                'error'
                              )
                        }
                    }
                });
            }
          })
    });


});