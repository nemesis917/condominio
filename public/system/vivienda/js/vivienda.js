$(document).ready(function(){
    $('#cargarEmpresa').val("");
    limpiar();

    function limpiarAlicuotas()
    {
        $('#cantViv').html("0");
        $('#alic').html("0" + " Porciento");
        $('#porcAli').css("width", "0" + "%");
    }



    let ruta = 'viviendas/ajax/consulta';
    miLista(ruta);

    $('#cargarAlicuota').numeric({decimalPlaces: 8,  negative: false});
    $('#cargarGastos').numeric({decimalPlaces: 2,  negative: false});
    $('#cargarTlfHabitacion').numeric({negative: false, decimal: false});  
    $('#cargarTlfMovil').numeric({negative: false, decimal: false});  

    function limpiar(){
        $('#cargarNumeroInmueble').val("");
        $('#cargarEstadoInmueble').val("");
        $('#cargarNombrePropietario').val("");
        $('#cargarApellidoPropietario').val("");
        $('#cargarAlicuota').val("");
        $('#cargarGastos').val("");
        $('#cargarTlfHabitacion').val("");
        $('#cargarTlfMovil').val("");
        $('#cargarCorreo').val("");
    }

    function porcentajeAlicuota(valor)
    {
        $.ajax({
            url: 'viviendas/ajax/porcentaje-alicuota/' + valor,
            type: 'get',
            dataType: 'json',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        })
        .done(function(comp) {

            $('#cantViv').html(comp[0][0].cant_apart + " viviendas");
            $('#alic').html(comp[1].toFixed(2) + " Porciento");
            $('#porcAli').css("width", comp[1] + "%");


        })
        .fail( function(){
            console.log("fallo el ajax en le porcentaje de alicuota");
            
        })  
    }


    function miLista(ruta){
        $('#consultarVivienda').DataTable({
            "ajax": ruta,
            columns: [
                {data: 'num_inmueble'},
                { data: null, render: function ( data ) {

                    return data.nombre+' '+data.apellido;
                } },
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
        
        if (e === "") {
            $('#consultarVivienda').DataTable().ajax.reload();
            let arreglo = ['<option value="">Seleccione...</option>'];
            $('#cargarEdificio').html(arreglo);
            miLista(ruta);
            limpiarAlicuotas();
        } else {
            
            $.ajax({
                url: 'viviendas/ajax/verEmpresa/' + e,
                type: 'GET',
                dataType: 'json',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {id: e}
            })
            .done(function(comp) {
                
                let arreglo = ['<option value="">Seleccione...</option>'];
    
                for (let index = 0; index < comp.length; index++) {
                    arreglo.push('<option value="' + comp[index].id + '">' + comp[index].nombre_edificio + '</option>');
                }
                $('#cargarEdificio').html(arreglo);
            })
            .fail( function(){
                console.log("fallo el ajax en el el select de empresa");
            })
        }

    });


    $('#cargarEdificio').on('change', function(){
        $('#consultarVivienda').DataTable().ajax.reload();
        if (this.value == "") {
            let ruta = 'viviendas/ajax/consulta';
            miLista(ruta);
            limpiarAlicuotas()
        } else {
            let valor = 'viviendas/ajax/consultas/' +  this.value;
            miLista(valor);
            porcentajeAlicuota( this.value );
        }
    });


    $('#limpiarFormulario').on('click', function(){
        limpiar();
    });

    $('#cargarFormulario').on('click', function(){

        if(
            $('#cargarEmpresa').val() == "" || $('#cargarEdificio').val() == "" || 
            $('#cargarNumeroInmueble').val() == "" || $('#cargarEstadoInmueble').val() == "" || 
            $('#cargarNombrePropietario').val() == "" || $('#cargarApellidoPropietario').val() == "" || 
            $('#cargarAlicuota').val() == "" || $('#cargarGastos').val() == "" || 
            $('#cargarTlfHabitacion').val() == "" || $('#cargarTlfMovil').val() == "" || 
            $('#cargarCorreo').val() == ""
          ){
            Swal.fire(
                'Un campo se encuentra vacio!',
                'Por favor valida que no queden campos vacios',
                'error'
            );
            return false; 
        }

        // event.preventDefault();
        $.ajax({
            url: 'viviendas/ajax/guardar-apartamento/',
            type: 'get',
            dataType: 'json',
            data: {
                cargarEmpresa: $('#cargarEmpresa').val(), 
                cargarEdificio: $('#cargarEdificio').val(), 
                cargarNumeroInmueble: $('#cargarNumeroInmueble').val(),
                cargarEstadoInmueble: $('#cargarEstadoInmueble').val(),
                cargarNombrePropietario: $('#cargarNombrePropietario').val(),
                cargarApellidoPropietario: $('#cargarApellidoPropietario').val(),
                cargarAlicuota: $('#cargarAlicuota').val(),
                cargarGastos: $('#cargarGastos').val(),
                cargarTlfHabitacion: $('#cargarTlfHabitacion').val(),
                cargarTlfMovil: $('#cargarTlfMovil').val(),
                cargarCorreo: $('#cargarCorreo').val()            
            },
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            
        })
        .done(function(comp) {
            if (comp === true) {
                $('#consultarVivienda').DataTable().ajax.reload();
                porcentajeAlicuota( $('#cargarEdificio').val() );
                limpiar();
            } else {
                alert("Hubo un error, no pudo cargar el formulario");
            }
        })
        .fail( function(){
            console.log("fallo el ajax en el el select de empresa");
            
        })

    });




});