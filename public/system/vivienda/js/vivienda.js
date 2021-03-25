$(document).ready(function(){
    
    let ruta = 'viviendas/ajax/consulta';
    miLista(ruta);
    function miLista(ruta){
        $('#consultarVivienda').DataTable({
            "ajax": ruta,
            columns: [
                {data: 'num_inmueble'},
                {data: 'nombre'},
                {data: 'apellido'},
                {data: 'btn', orderable: false, searchable: false},
            ],
            "destroy": true,
            "language" : {
                url: '../plugins/datatables/js/espanol.json'
            },
            "bLengthChange": false,
            "order": [[ 0, "desc" ]],
            "searching": true,
            "info": false
        });
    }


    $('#cargarEmpresa').on('change', function(){
        let e = $(this).val();
        $.ajax({
            url: 'viviendas/ajax/verEmpresa/' + e,
            type: 'GET',
            dataType: 'json',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {id: e}
        })
        .done(function(comp) {
            console.log(comp);
            
            let arreglo = ['<option value="">Seleccione...</option>'];

            for (let index = 0; index < comp.length; index++) {
                arreglo.push('<option value="' + comp[index].id + '">' + comp[index].nombre_edificio + '</option>');
            }
            $('#cargarEdificio').html(arreglo);
        })
        .fail( function(){
            console.log("fallo el ajax en el el select de empresa");
        })
    });


    $('#cargarEdificio').on('change', function(){
        $('#example').DataTable().ajax.reload();
        if (this.value == "") {
            let ruta = 'viviendas/ajax/consulta';
            miLista(ruta);
        } else {
            let valor = 'viviendas/ajax/consultas/' +  this.value;
            console.log( valor );
            miLista(valor);
        }
    });









});