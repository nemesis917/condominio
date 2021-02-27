$(function () {
    $('#consultarEmpresa').DataTable({
        "ajax": 'ajax/consultarEmpresa',
            columns: [
                {data: 'empresa', name: 'empresa'},
                {data: 'btn', name: 'btn', orderable: false, searchable: false},
            ],
            "language" : {
                url: '../../plugins/datatables/js/espanol.json'
            },
        "bLengthChange": false,
        "order": [[ 0, "desc" ]],
        "searching": true,
        "info": false
    });

});

$(document).on('click','#verConsulta', function(){
    $('#empresa').val('');
    $('#data').val('');
    let ver = $(this).val();
    $.ajax({
        url: 'ajax/consultarUnaEmpresa',
        type: 'POST',
        dataType: 'json',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {id: ver}
    })
    .done(function(comp) {
        if (comp) {
            //$('#listadoCulminados').DataTable().ajax.reload();
            //console.log(comp.empresa);
            $('#empresa').val(comp.empresa);
            $('#data').val(comp.id);
        }
    })
    .fail( function(){
        console.log("fallo el ajax en el ID ver");
    })

});

$(document).on('click','#borrarConsulta', function(){
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
                url: 'ajax/eliminarUnaEmpresa',
                type: 'POST',
                dataType: 'json',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {id: eliminar}
            })
            .done(function(comp) {
                if (comp) {
                    $('#consultarEmpresa').DataTable().ajax.reload();
                    Swal.fire(
                        'Se ha eliminado',
                        'de manera satisfactoria',
                        'success'
                      )
                }
            })
            .fail( function(){
                console.log("fallo el ajax en el ID eliminar");
            })
        }
      })    

    
});