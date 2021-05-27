$(document). ready(function(){

    $('#lista-gastos').DataTable({
        "ajax": 'gastos-generales',
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal( {
                    header: function ( row ) {
                        var data = row.data();
                        return 'Detalles para '+data[0]+' '+data[1];
                    }
                } ),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                    tableClass: 'table'
                } )
            }
        },
        columns: [
            {data: 'codigo_gastos'},
            {data: 'descripcion_gastos'},
            {data: 'estados'},
            {data: 'btn', orderable: false, searchable: false},
        ],
        "destroy": true,
        "language" : {
            url: '../plugins/datatables/js/espanol.json'
        },
        "bLengthChange": false,
        "searching": true,
        "info": false
    });



});