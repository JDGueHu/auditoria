$(document).ready(function() {
    var t = $('#inlineExamenes').DataTable({

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

    var tR = $('#restriccionesInlineTable').DataTable({

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
        ordering: false,
        info:     false

    });

    $('#nuevoExamen').on( 'click', function () {
        $(".ocultarShowExamen").removeClass("ocultar");
        $(".agregarExamenSubpanel").removeClass("ocultar");
        $("#secionRestriccionesModal").removeClass("ocultar");
        tR.clear().draw();;

        $("#tipoExamen").val("");
        $("#fechaExamen").val("");
        $("#concepto").val("");
        $("#restriccion").val("");

        $("#tipoExamen").prop( "disabled", false );
        document.getElementById("fechaExamen").removeAttribute("readonly");
        document.getElementById("concepto").removeAttribute("readonly");

    });



    ///////// Para crear las restricciones medicas
    $( "#restriccion" ).change(function(){
        $("#requeridoRestriccion").addClass( "ocultar" );
    });

    $('#addRestriccionMedica').on( 'click', function () {

        if($('#restriccion').val() == ''){
            $("#requeridoRestriccion").removeClass( "ocultar" );
        }
        else{

            $("#requeridoRestriccion").addClass( "ocultar" );

            var pathname = window.location.pathname;
            var url;

            if(pathname.substring(pathname.length - 4, pathname.length) == "edit"){
                url = '../../../administracion/restriccionesMedicas/createAjax';
            }else{
                url = '../../administracion/restriccionesMedicas/createAjax';
            }

            var data = "restriccion="+$("#restriccion").val()+"&tmp="+$("#tmp").val() ;


            $.ajax({
              url: url,
              headers: {'X-CSRF-TOKEN': $('input[name=_token]').val()},
              type: 'POST',
              data: data
            }).done(function(response){
                $("#restriccion").val('');
                //console.log(response);  
                tR.row.add( [
                response.restriccion+'<span style="opacity:0">z$&'+response.id+'</span>',
                '<a title="Eliminar" class="btn btn-danger btn-xs buttonDestroyRestriccion"><i class="fa fa-trash-o" aria-hidden="true"></i></a>'
            ] ).draw( false );            
            });
        }
    });



    // Eliminar restriccion medica en tabla         
    $('#restriccionesInlineTable tbody').on( 'click', '.buttonDestroyRestriccion', function () {

        var  cadena = $(this).parents('tr').children().eq(0).text();
        var array = cadena.split("z$&");

        if ( $(this).parents('tr').hasClass('eliminarRestriccion') ) {
            $(this).parents('tr').removeClass('eliminarRestriccion');
        }
        else {
            t.$('tr.eliminarRestriccion').removeClass('eliminarRestriccion');
            $(this).parents('tr').addClass('eliminarRestriccion');
        }   

        $.confirm({
            title: 'Eliminar',
            content: 'Va a eliminar una restricción ¿Desea continuar?',
            buttons: {
                ok: function () {

                    var pathname = window.location.pathname;
                    var url;

                    if(pathname.substring(pathname.length - 4, pathname.length) == "edit"){
                        url = '../../../administracion/restriccionesMedicas/'+array[1]+'/destroyAjax';
                    }else{
                        url = '../../administracion/restriccionesMedicas/'+array[1]+'/destroyAjax';
                    }

                    $.ajax({
                      url: url,
                      type: 'GET'
                    }).done(function(response){
                      //console.log(response);
                      tR.row('.eliminarRestriccion').remove().draw( false );
                    });
                },
                cancel: function () {}
            }
        });

    });

    ///// Crear examen Ajax
    $.fn.crearExamenAjax = function(tipoCreacion) {

        var identificacion = $('#identificacion').val();
        var tipoExamen = $('#tipoExamen').val();
        var fechaExamen = $('#fechaExamen').val();      
        var adjunto = $('#adjuntoExamen').prop('files')[0];
        var concepto = $('#concepto').val();    
        var tmp = $('#tmp').val();    

        var form_data = new FormData();
        form_data.append('identificacion', identificacion);
        form_data.append('tipoExamen', tipoExamen);
        form_data.append('fechaExamen', fechaExamen);
        form_data.append('concepto', concepto);
        form_data.append('tmp', tmp);
        form_data.append('adjunto', adjunto);

        $.ajax({
          url: '../../administracion/examenes/createAjax',
          headers: {'X-CSRF-TOKEN': $('input[name=_token]').val()},
          type: 'POST',
          datatype:'json',
          contentType: false,
          cache: false,
          processData: false,
          data : form_data
        }).done(function(response){
            //console.log(response);

            t.row.add( [
                response[0].tipoExamen+'<span style="opacity:0">-'+response[0].id+'</span>',
                response[0].fechaExamen,
                '<a title="Adjunto" href="'+response[0].adjunto+'" target="_blank"><i class="fa fa-file" aria-hidden="true"></i> Archivo adjunto</a>',
                '<a title="Detalles" class="btn btn-default btn-xs buttonDetailExamenes"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp;<a title="Eliminar" class="btn btn-danger btn-xs buttonDestroyExamen"><i class="fa fa-trash-o" aria-hidden="true"></i></a>'
            ] ).draw( false );

            $("#tipoExamen").val("");
            $("#fechaExamen").val("");
            $("#adjuntoExamen").val("");
            $("#concepto").val("");
            $('#modalExamenes').modal('toggle');
        });

    };

    // Eliminar examen       
    $('#inlineExamenes tbody').on( 'click', '.buttonDestroyExamen', function () {

        var validate = confirm('Va a eliminar un examen ¿Desea continuar?');

        if (validate == true) {
            if ( $(this).parents('tr').hasClass('eliminar') ) {
                $(this).parents('tr').removeClass('eliminar');
            }
            else {
                t.$('tr.eliminar').removeClass('eliminar');
                $(this).parents('tr').addClass('eliminar');
            }   

            var  cadena = $(this).parents('tr').children().eq(0).text();
            var array = cadena.split("-");

            $.ajax({
                  url: '../../administracion/examenes/'+array[1]+'/destroyAjax',
                  type: 'GET'
                }).done(function(response){
                    //console.log(response);
                  t.row('.eliminar').remove().draw( false );
                });
        }

    });

    ///////////// Detalle de examen
    $('#inlineExamenes tbody').on( 'click', '.buttonDetailExamenes', function () {

        $(".ocultarShowExamen").addClass("ocultar");
        $(".agregarExamenSubpanel").addClass("ocultar");

        var  cadena = $(this).parents('tr').children().eq(0).text();
        var array = cadena.split("-");

        $.ajax({
              url: '../../administracion/examenes/'+array[1]+'/showAjax',
              type: 'GET'
            }).done(function(response){
                
                $(".addRow").addClass("ocultar");
                $(".editRow").addClass("ocultar");      
                $("#secionRestriccionesModal").addClass("ocultar");  
                $("#tipoExamen").prop( "disabled", true );
                document.getElementById("fechaExamen").setAttribute("readonly","readonly");
                document.getElementById("concepto").setAttribute("readonly","readonly");

                $('#modalExamenes').modal('show');   
                $("#tipoExamen").val(response.tipoExamen);
                $("#fechaExamen").val(response.fechaExamen);
                $("#concepto").val(response.concepto);

                /// Peticion para cargar las restricciones
                $.ajax({
                      url: '../../administracion/restriccionesMedicas/'+response.id+'/showAjax',
                      type: 'GET'
                    }).done(function(response){

                        tR.rows().remove().draw();
                        
                        response.forEach(function(item) {
                            tR.row.add( [
                                item.restriccion,
                                ' '
                            ] ).draw( false );
                        });

                    });



            });
    } );

/////////////////////////////////////////////////

} );