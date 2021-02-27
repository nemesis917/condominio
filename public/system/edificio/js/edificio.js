
$(function () {

    $('#consultarEdificio').DataTable({
        "ajax": 'edificio/ajax/consulta',
            columns: [
                {data: 'nombre_edificio'},
                {data: 'btn', orderable: false, searchable: false},
            ],
            "language" : {
                url: '../plugins/datatables/js/espanol.json'
            },
        "bLengthChange": false,
        "order": [[ 0, "desc" ]],
        "searching": true,
        "info": false
    });

});


$('#reserva').numeric({decimalPlaces: 2,  negative: false});
$('#codigoE').numeric({negative: false, decimal: false});  
$('#codigoG').numeric({negative: false, decimal: false});  
$('#morosos').numeric({decimalPlaces: 2,  negative: false});
$('#iva').numeric({decimalPlaces: 2,  negative: false});
$('#cheque').numeric({decimalPlaces: 2,  negative: false});
$('#honorarios').numeric({decimalPlaces: 2,  negative: false});
$('#postal').numeric({negative: false, decimal: false});

$('#reserva-mod').numeric({decimalPlaces: 2,  negative: false});
$('#codigoE-mod').numeric({negative: false, decimal: false});
$('#codigoG-mod').numeric({negative: false, decimal: false}); 
$('#morosos-mod').numeric({decimalPlaces: 2,  negative: false});
$('#iva-mod').numeric({decimalPlaces: 2,  negative: false});
$('#cheque-mod').numeric({decimalPlaces: 2,  negative: false});
$('#honorarios-mod').numeric({decimalPlaces: 2,  negative: false});
$('#postal-mod').numeric({negative: false, decimal: false});



$('#reserva').on('change', function(){
    if( $('#reserva').val().length < 3 ){
        $('#reserva').val($('#reserva').val() + ".00");
    }
});

$('#morosos').on('change', function(){
    if( $('#morosos').val().length < 3 ){
        $('#morosos').val($('#morosos').val() + ".00");
    }
});

$('#iva').on('change', function(){
    if( $('#iva').val().length < 3 ){
        $('#iva').val($('#iva').val() + ".00");
    }
});

$('#cheque').on('change', function(){
    if( $('#cheque').val().length < 3 ){
        $('#cheque').val($('#cheque').val() + ".00");
    }
});



$('#reserva-mod').on('change', function(){
    if( $('#reserva-mod').val().length < 3 ){
        $('#reserva-mod').val($('#reserva-mod').val() + ".00");
    }
});

$('#morosos-mod').on('change', function(){
    if( $('#morosos-mod').val().length < 3 ){
        $('#morosos-mod').val($('#morosos-mod').val() + ".00");
    }
});

$('#iva-mod').on('change', function(){
    if( $('#iva-mod').val().length < 3 ){
        $('#iva-mod').val($('#iva-mod').val() + ".00");
    }
});

$('#cheque-mod').on('change', function(){
    if( $('#cheque-mod').val().length < 3 ){
        $('#cheque-mod').val($('#cheque-mod').val() + ".00");
    }
});

$('#codigoE').on('change', function(){
    if ( $('#codigoE').val().length == 1 ) {
        $('#codigoE').val( "00" +$('#codigoE').val() );
    } else {
        if ($('#codigoE').val().length == 2) {
            $('#codigoE').val( "0" +$('#codigoE').val() );
        }
    }
});

$('#codigoE-mod').on('change', function(){
    if ( $('#codigoE-mod').val().length == 1 ) {
        $('#codigoE-mod').val( "00" +$('#codigoE-mod').val() );
    } else {
        if ($('#codigoE-mod').val().length == 2) {
            $('#codigoE-mod').val( "0" +$('#codigoE-mod').val() );
        }
    }
});

$(document).on('click','#modEdificio', function(){
    let e = $(this).val();
    $.ajax({
        url: 'edificio/ajax/modificarUnaEmpresa',
        type: 'POST',
        dataType: 'json',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {id: e}
    })
    .done(function(comp) {
        $('#modificarEsteDat').attr('disabled', true); 
        let opcion = '<option value="">Seleccione...</option>';
        for (let index = 0; index < comp[2].length; index++) {
            if (comp[2][index].id == comp[1].id) {
                opcion+= '<option value="' + comp[2][index].id + '" selected>' + comp[2][index].empresa + '</option>';
            } else {
                opcion+= '<option value="' + comp[2][index].id + '">' + comp[2][index].empresa + '</option>';
            }
            $('#empresa-mod').html(opcion);
        }

        $("#codigoE-mod").val(comp[0].codigo_edificio);
        $("#nombreE-mod").val(comp[0].nombre_edificio);
        $("#codigoG-mod").val(comp[0].codigo_gerente);
        $("#honorarios-mod").val(comp[0].honorarios_edif.toFixed(2));
        $("#ubicacion-mod").val(comp[0].ubicacion);
        $("#direccion-mod").val(comp[0].direccion);
        $("#postal-mod").val(comp[0].codigo_postal);
        $("#reserva-mod").val(comp[0].porc_fondo_reserva.toFixed(2));
        $("#morosos-mod").val(comp[0].porc_intereces_mor.toFixed(2));
        $("#iva-mod").val(comp[0].iva.toFixed(2));
        $("#cheque-mod").val(comp[0].porc_comision_cheque_devuelto.toFixed(2));
        $("#comentario-mod").val(comp[0].comentario);
        $('#modificarEsteDat').attr('disabled', false); 
        $('#dataTips').val(e);

    })
    .fail( function(){
        console.log("fallo el ajax en el ID ver");
    })
});


$('form').submit(function(){
    $('#modificarEsteDat').attr('value', "Modificando...");
    $('#guar').attr('value', "Guardando...");
    $(this).find(':submit').attr('disabled','disabled');
});




  $(document).on('click','#borrarEdificio', function(){
    let eliminar = $(this).val();

    Swal.fire({
        title: '¿Esta usted seguro',
        text: "de querer eliminar esta empresa?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.value) {
            $.ajax({
                url: '../sistema/edificio/ajax/eliminarUnEdificio',
                type: 'POST',
                dataType: 'json',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {id: eliminar}
            })
            .done(function(comp) {
                if (comp) {
                    $('#consultarEdificio').DataTable().ajax.reload();
                    if (comp == 1) {
                        Swal.fire(
                            'Se ha eliminado',
                            'de manera satisfactoria',
                            'success'
                          );
                    } else {
                        Swal.fire(
                            'No se pudo eliminar',
                            'Tiene apartamentos asignados, elimine primero',
                            'warning'
                          );
                    }
                }
            })
            .fail( function(){
                Swal.fire(
                    'No se pudo eliminar',
                    'Hubo problemas para atender su solicitud',
                    'error'
                );
            })
        }
      })        
});