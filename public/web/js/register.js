$(document).ready( function(){

    $('#registrar').attr("disabled", true);

    $('#email').on('change', function(){
        $.ajax({
            url: 'user-validate',
            type: 'POST',
            dataType: 'json',
            data: { id: $('#email').val() },
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        }).done(function(comp) {
            console.log(comp)
            switch (comp) {
                case 2:
                Swal.fire(
                    'El correo ',
                    'ya esta registrado!',
                    'error'
                )
                $('#registrar').attr("disabled", true);
                console.log("uno");
                break;
                case 3:
                Swal.fire(
                    'El correo',
                    'aun no tiene el acceso autorizado',
                    'error'
                )
                $('#registrar').attr("disabled", true);
                console.log("dos");
                break;
                default:
                Swal.fire(
                    'Hubo un error descocnocido',
                    'Contacte al departamento encargado',
                    'error'
                )
                $('#registrar').attr("disabled", true);
                console.log("tres");
            }
        })

    });

    $('#password_confirmation').on('keyup', function(){
        if ( $('#password').val() === $('#password_confirmation').val() ) {
            $('#registrar').attr("disabled", false);
        } else {
            $('#registrar').attr("disabled", true);
        }
    });

    $('#name, #lastname, #email, #password, #password_confirmation').on('change', function(){
        if ( $('#name').val() == "" || $('#lastname').val() == "" || $('#email').val() == "" || $('#password').val() == "" || $('#password_confirmation').val() == ""  ) {
            $('#registrar').attr("disabled", true);
        } else {
            $('#registrar').attr("disabled", false);
        }
    })

    $('#password').on('change', function(){
        let x = $('#password').val();
        if(x.length < 8){
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
    
    $('#registrar').click(function(){
        $('#registrar').attr("value", "Espere... tardaré 15 seg");
    });




});