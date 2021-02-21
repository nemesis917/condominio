$(function () {
    $('#consultarEmpresa').DataTable({
        "ajax": 'ajax/consultarEmpresa',
            columns: [
                {data: 'empresa', name: 'empresa'},
                {data: 'btn', name: 'btn', orderable: false, searchable: false},
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

$(document).on('click','#ver', function(){
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
        console.log("fallo el ajax");
    })
    // alert(ver);
});

$(document).on('click','#borrar', function(){
    let eliminar = "El numero a eliminar es " + $(this).val();
    console.log(eliminar);
    alert(eliminar);
});