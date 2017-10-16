var t = $('#inlineFormaciones').DataTable({

    language: {
        lengthMenu: "Mostrar _MENU_ registros por página",
        zeroRecords: "No hay registros para mostrar",
        info: "Mostrando página _PAGE_ de _PAGES_ con _MAX_ registros",
        infoEmpty: "No hay registros disponibles",
        infoFiltered: "(Filtrado de _MAX_ registros totales)",
        sSearch: "Buscar",
        paginate: {
        first:      "Primera",
        previous:   "Anterior",
        next:       "Siguiente",
        last:       "Última"
        }
    },
    pageLength: 5,

});

$(document).ready(function() {

     //// Eventos al hacer click en click en nuevo 
     $('#nuevoFormacion').on( 'click', function () {
        $(".addRowFormacion").removeClass("ocultar");
        $(".editRowFormacion").addClass("ocultar");
        $(".ocultarShowFormacion").removeClass("ocultar");

        $("#tipoEstudio").val("");
        $("#intExt").val("");
        $("#nivelEstudio_id").val("");
        $("#areaEstudio_id").val("");
        $("#titulacion").val('');
        $("#institucionEducativa").val("");
        $("#estado").val('');        
        $("#fechaInicio").val("");
        $("#fechaFin").val("");
        $("#ciudadNacimientoFormacion").val("");

    } );

    /// Validaciones y creacion de formación
    $('.addRowFormacion').on( 'click', function () {
        validarFormacionAjax(1);
    } );


    ///////// Detalle de contrato

    $('#inlineFormaciones tbody').on( 'click', '.buttonDetailFormaciones', function () {

        var  cadena = $(this).parents('tr').children().eq(1).text();
        var array = cadena.split("-");

        $.ajax({
              url: '../../administracion/formaciones/'+array[1]+'/showAjax',
              type: 'GET'
            }).done(function(response){
                
                $(".addRowFormacion").addClass("ocultar");
                $(".editRowFormacion").addClass("ocultar");

                $("#tipoEstudio").prop( "disabled", true );
                $("#intExt").prop( "disabled", true );
                $("#nivelEstudio_id").prop( "disabled", true );
                $("#areaEstudio_id").prop( "disabled", true );
                document.getElementById("titulacion").setAttribute("readonly","readonly");
                document.getElementById("institucionEducativa").setAttribute("readonly","readonly");
                $("#estadoFormacion").prop( "disabled", true );
                document.getElementById("fechaInicioFormacion").setAttribute("readonly","readonly");
                document.getElementById("fechaFinFormacion").setAttribute("readonly","readonly");
                document.getElementById("ciudadNacimientoFormacion").setAttribute("readonly","readonly");
                console.log(response);
                $(".ocultarShowFormacion").addClass("ocultar");
                $('#modalFormaciones').modal('show');   
                $("#tipoEstudio").val(response[0].tipoEstudio);
                $("#intExt").val(response[0].intExt);
                $("#nivelEstudio_id").val(response[0].nivelEstudio);
                $("#areaEstudio_id").val(response[0].areasEstudio);
                $("#titulacion").val(response[0].titulacion);
                $("#estadoFormacion").val(response[0].estado);
                $("#institucionEducativa").val(response[0].institucionEducativa);
                $("#fechaInicioFormacion").val(response[0].fechaInicio);
                $("#fechaFinFormacion").val(response[0].fechaFin);
                $("#ciudadNacimientoFormacion").val(response[0].ciudadEstudio);

            });
    } );

    //////////// Eliminación de contrato

    $('#inlineFormaciones tbody').on( 'click', '.buttonDestroyFormaciones', function () {

        var validate = confirm('Va a eliminar una formación ¿Desea continuar?');

        if (validate == true) {
            if ( $(this).parents('tr').hasClass('eliminar') ) {
                $(this).parents('tr').removeClass('eliminar');
            }
            else {
                t.$('tr.eliminar').removeClass('eliminar');
                $(this).parents('tr').addClass('eliminar');
            }   

            var  cadena = $(this).parents('tr').children().eq(1).text();
            var array = cadena.split("-");

            $.ajax({
                  url: '../../administracion/formaciones/'+array[1]+'/destroyAjax',
                  type: 'GET'
                }).done(function(response){
                    //console.log(response);
                  t.row('.eliminar').remove().draw( false );
                });
        }

    });

    ///// Crear formacion Ajax
    $.fn.crearFormacionAjax = function(tipoCreacion) {

            if(tipoCreacion == 2){ //Edicion de formación
                $("#editFormacion").submit();
            }else{

                //var data = "tipoIdentificacion="+$("#tipoIdentificacion").val()+"&identificacion="+$("#identificacion").val()+"&tipoEstudio="+$("#tipoEstudio").val()+"&intExt="+$("#intExt").val()+"&nivelEstudio_id="+$("#nivelEstudio_id").val()+"&areaEstudio_id="+$("#areaEstudio_id").val()+"&titulacion="+$("#titulacion").val()+"&institucionEducativa="+$("#institucionEducativa").val()+"&estado="+$("#estadoFormacion").val()+"&fechaInicio="+$("#fechaInicioFormacion").val()+"&fechaFin="+$("#fechaFinFormacion").val()+"&ciudadNacimiento="+$("#ciudadNacimientoFormacion").val();
                if (tipoCreacion == 1){}
                else{}
                var identificacion = $('#identificacion').val();
                var tipoEstudio = $('#tipoEstudio').val();
                var intExt = $('#intExt').val();  
                var nivelEstudio_id = $('#nivelEstudio_id').val();        
                var areaEstudio_id = $('#areaEstudio_id').val(); 
                var titulacion = $('#titulacion').val();  
                var institucionEducativa = $('#institucionEducativa').val();
                var estadoFormacion = $('#estadoFormacion').val();
                var fechaInicioFormacion = $('#fechaInicioFormacion').val();
                var fechaFinFormacion = $('#fechaFinFormacion').val();
                var ciudadNacimientoFormacion = $('#ciudadNacimientoFormacion').val();
                var adjunto = $('#adjuntoFormacion').prop('files')[0];

                var form_data = new FormData();
                form_data.append('identificacion', identificacion);
                form_data.append('tipoEstudio', tipoEstudio);
                form_data.append('intExt', intExt);
                form_data.append('nivelEstudio_id', nivelEstudio_id);
                form_data.append('areaEstudio_id', areaEstudio_id);
                form_data.append('titulacion', titulacion);
                form_data.append('institucionEducativa', institucionEducativa);
                form_data.append('estado', estadoFormacion);
                form_data.append('fechaInicio', fechaInicioFormacion);
                form_data.append('fechaFin', fechaFinFormacion);
                form_data.append('ciudadNacimiento', ciudadNacimientoFormacion);
                form_data.append('adjunto', adjunto);

                $.ajax({
                  url: '../../administracion/formaciones/createAjax',
                  headers: {'X-CSRF-TOKEN': $('input[name=_token]').val()},
                  type: 'POST',
                  datatype:'json',
                  contentType: false,
                  cache: false,
                  processData: false,
                  data: form_data
                }).done(function(response){
                    console.log(response);
                    if (tipoCreacion == 1){ // Creacion desde subpanel
                        t.row.add( [
                            response[0].tipoEstudio,
                            response[0].intExt+'<span style="opacity:0">-'+response[0].id+'</span>',
                            response[0].nivelEstudio_id,
                            response[0].areaEstudio_id,
                            response[0].estado,
                            '<a title="Adjunto" href="'+response[0].adjunto+'" target="_blank"><i class="fa fa-file" aria-hidden="true"></i> Archivo adjunto</a>',
                            '<a title="Detalles" class="btn btn-default btn-xs buttonDetailFormaciones"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp;<a title="Eliminar" class="btn btn-danger btn-xs buttonDestroyFormaciones"><i class="fa fa-trash-o" aria-hidden="true"></i></a>'
                        ] ).draw( false );

                    limpiarInputs();
                    $('#modalFormaciones').modal('toggle');

                    }else{ // Crear desde modulo formacines

                        var pathname = window.location.pathname;
                        pathname = pathname.substring(0, pathname.length - 7)

                        $.confirm({
                            title: 'Formación almacenda',
                            content: 'Se guardó la formación exitosamente ¿Desea agregar otra formación?',
                            buttons: {
                                Agregar: {
                                text: 'Nueva formación',
                                btnClass: 'btn btn-success',
                                action: function(){
                                   limpiarInputs();
                                }
                                },
                                Cancelar: function () {
                                     window.location.replace(pathname);
                                },
                            }
                        });  
                        
                    }
          
                });
            }   

    }



} );

function limpiarInputs(){

    $("#tipoEstudio").val('');
    $("#intExt").val('');
    document.getElementById("intExt").setAttribute("disabled","disabled");
    $("#nivelEstudio_id").val('');
    document.getElementById("nivelEstudio_id").setAttribute("disabled","disabled");
    $("#areaEstudio_id").val('');
    $("#titulacion").val('');
    $("#institucionEducativa").val('');
    $("#estadoFormacion").val('');
    $("#fechaInicioFormacion").val('');
    document.getElementById("fechaFinFormacion").setAttribute("readonly","readonly");
    $("#fechaFinFormacion").val('');
    $("#ciudadNacimientoFormacion").val('');

}