$(document).ready(function(){
    $('#cargarEmpresa').val("");
    $('#cargarNumeroInmueble').focus();
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
    $('#cargarAlicuotaMod').numeric({decimalPlaces: 8,  negative: false});
    $('#cargarGastosMod').numeric({decimalPlaces: 2,  negative: false});
    $('#cargarTlfHabitacionMod').numeric({negative: false, decimal: false});  
    $('#cargarTlfMovilMod').numeric({negative: false, decimal: false});  

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

    function limpiarMod(){
        $('#cargarNumeroInmuebleMod').val("");
        $('#cargarEstadoInmuebleMod').val("");
        $('#cargarNombrePropietarioMod').val("");
        $('#cargarApellidoPropietarioMod').val("");
        $('#cargarAlicuotaMod').val("");
        $('#cargarGastosMod').val("");
        $('#cargarTlfHabitacionMod').val("");
        $('#cargarTlfMovilMod').val("");
        $('#cargarCorreoMod').val("");
    }

    function porcentajeAlicuota(valor)
    {
        let edif = $('#cargarEdificio').val();
        $.ajax({
            url: 'viviendas/ajax/porcentaje-alicuota/' + valor + edif,
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


    $('#cargarEmpresa, #cargarEmpresaMod').on('change', function(){
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
                $('#cargarEdificioMod').html(arreglo);
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

    $('#limpiarFormularioMod').on('click', function(){
        limpiarMod();
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
                $('#cargarNumeroInmueble').focus();
                limpiar();
            } else {
                alert("Hubo un error, no pudo cargar el formulario");
            }
        })
        .fail( function(){
            console.log("fallo el ajax en el el select de empresa");
            
        })

    });

    $(document).on('click','#modVivienda', function(){

        let emp = $('#cargarEmpresa').val();
        let edf = $('#cargarEdificio').val();

        

        $.ajax({
            type: "GET",
            url: "viviendas/ajax/modificar/" +  this.value + "d34h765" +$('#cargarEdificio').val(),
            data: "data",
            dataType: "json",
            success: function (response) {
                console.log( response);
                $('#cargarEmpresaMod').val( emp );
                $('#cargarEdificioMod').val( edf );
                $('#cargarNumeroInmuebleMod').attr("value",response.num_inmueble);
                $('#cargarEstadoInmuebleMod').attr( "value",response.estado_inmueble );
                $('#cargarNombrePropietarioMod').attr( "value",response.nombre );
                $('#cargarApellidoPropietarioMod').attr( "value",response.apellido );
                $('#cargarAlicuotaMod').attr( "value",response.alicuota );
                $('#cargarGastosMod').attr( "value",response.gastos_administracion );
                $('#cargarTlfHabitacionMod').attr( "value",response.telefono_habitacion );
                $('#cargarTlfMovilMod').attr( "value",response.telefono_oficina );
                $('#cargarCorreoMod').attr( "value",response.correo );
                $('#hiddena').attr( "value",response.id );
                $('#hiddenb').attr( "value", $('#cargarEmpresa').val() );
                $('#hiddenc').attr( "value", $('#cargarEdificio').val() );
            }
        }).fail( function(){
            console.log("fallo el ajax en modificar la vivienda");
            
        });
    });

    $(document).on('click', '#borrarVivienda', function(){
        let e = this.value;
        
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
                url: 'viviendas/ajax/eliminar/2464568778',
                type: 'POST',
                dataType: 'json',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {id: e}
            })
            .done(function(comp) {
                $('#consultarVivienda').DataTable().ajax.reload();
                if (comp === true) {
                    Swal.fire(
                        'Se a eliminado',
                        'los datos asociados a esta vivienda',
                        'success'
                    );
                } else {
                    Swal.fire(
                        'No pudo eliminar',
                        'de la base de datos',
                        'error'
                    );
                }
            })
            .fail( function(){
                Swal.fire(
                    'No se pudo eliminar',
                    'Ya cuenta con información asociada',
                    'error'
                );
            })
            }
          })    

    });

    $('#cargarFormularioMod').on('click', function(){
        if(
            $('#cargarEmpresaMod').val() == "" || $('#cargarEdificioMod').val() == "" || 
            $('#cargarNumeroInmuebleMod').val() == "" || $('#cargarEstadoInmuebleMod').val() == "" || 
            $('#cargarNombrePropietarioMod').val() == "" || $('#cargarApellidoPropietarioMod').val() == "" || 
            $('#cargarAlicuotaMod').val() == "" || $('#cargarGastosMod').val() == "" || 
            $('#cargarTlfHabitacionMod').val() == "" || $('#cargarTlfMovilMod').val() == "" || 
            $('#cargarCorreoMod').val() == ""
          ){
            Swal.fire(
                'Un campo se encuentra vacio!',
                'Por favor valida que no queden campos vacios',
                'error'
            );
            return false; 
        }
    });


});