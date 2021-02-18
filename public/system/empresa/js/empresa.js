$(function () {
    $('#example1').DataTable({
        "ajax": 'ajax/consultarEmpresa',
        "columns": [
            {data: 'empresa'},
            {data: 'btn'},

        ],
        "bLengthChange": false,
        "order": [[ 0, "desc" ]],
        "searching": true,
        "info": false
    });
});