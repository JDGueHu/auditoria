$(document).ready(function() {
    var t = $('#inlineSST').DataTable({

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

    //// Eventos al hacer click en click en nuevo 
    $('#nuevo_sst').on( 'click', function () {

        $(".addRow_sst").removeClass("ocultar");
        $(".editRow_sst").addClass("ocultar");
        $(".ocultarShow_sst").removeClass("ocultar");

        $("#tipoSST_id").val("");
        $("#fechaSST").val("");
        $("#causaPrincipal_id").val("");
        $("#causaComplementaria_id").val("");
        $("#adjunto_sst").val('');
        $("#detallesSST").val("");

    } );

    // Crear SST
    $.fn.crear_sst_Ajax = function(tipoCreacion) {

        var identificacion = $('#identificacion').val();
        var tipoSST_id = $('#tipoSST_id').val();
        var fechaSST = $('#fechaSST').val();
        var causaPrincipal_id = $('#causaPrincipal_id').val();  
        var causaComplementaria_id = $('#causaComplementaria_id').val();     
        var adjunto = $('#adjunto_sst').prop('files')[0];
        var detallesSST = $('#detallesSST').val();      

        var form_data = new FormData();
        form_data.append('identificacion', identificacion);
        form_data.append('tipoSST_id', tipoSST_id);
        form_data.append('fechaSST', fechaSST);
        form_data.append('causaPrincipal_id', causaPrincipal_id);
        form_data.append('causaComplementaria_id', causaComplementaria_id);
        form_data.append('adjunto', adjunto);
        form_data.append('detallesSST', detallesSST);

        $.ajax({
          url: '../../administracion/SST/createAjax',
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
                response[0].tipoSST+'<span style="opacity:0">-'+response[0].id+'</span>',
                response[0].fechaSST,
                '<a title="Adjunto" href="'+response[0].adjunto+'" target="_blank"><i class="fa fa-file" aria-hidden="true"></i> Archivo adjunto</a>',
                '<a title="Detalles" class="btn btn-default btn-xs buttonDetailSST"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp;<a title="Eliminar" class="btn btn-danger btn-xs buttonDestroySST"><i class="fa fa-trash-o" aria-hidden="true"></i></a>'
            ] ).draw( false );

            $("#tipoSST_id").val("");
            $("#fechaSST").val("");
            $("#causaPrincipal_id").val("");
            $("#causaComplementaria_id").val("");
            $("#adjunto_sst").val("");
            $("#detallesSST").val("");
            $('#modalSST').modal('toggle');
        });
    };

    // Eliminar sst       
    $('#inlineSST tbody').on( 'click', '.buttonDestroySST', function () {

        var validate = confirm('Va a eliminar un SST ¿Desea continuar?');

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
                  url: '../../administracion/SST/'+array[1]+'/destroyAjax',
                  type: 'GET'
                }).done(function(response){
                    //console.log(response);
                  t.row('.eliminar').remove().draw( false );
                });
        }

    });


    ////// Detalle de contrato
    $('#inlineSST tbody').on( 'click', '.buttonDetailSST', function () {

        $(".ocultarShow_sst").addClass("ocultar");

        var  cadena = $(this).parents('tr').children().eq(0).text();
        var array = cadena.split("-");

        $.ajax({
              url: '../../administracion/SST/'+array[1]+'/showAjax',
              type: 'GET'
            }).done(function(response){
                
                $(".addRow_sst").addClass("ocultar");
                $(".editRow_sst").addClass("ocultar");
                
                $("#tipoSST_id").prop( "disabled", true );
                $("#causaPrincipal_id").prop( "disabled", true );
                $("#causaComplementaria_id").prop( "disabled", true );
                document.getElementById("fechaSST").setAttribute("readonly","readonly");
                document.getElementById("detallesSST").setAttribute("readonly","readonly");

                $('#modalSST').modal('show');   
                $("#tipoSST_id").val(response.tipoSST_id);
                $("#causaPrincipal_id").val(response.causaPrincipal_id);
                $("#causaComplementaria_id").val(response.causaComplementaria_id);
                $("#fechaSST").val(response.fechaSST);
                $("#detallesSST").val(response.detalles);

            });
    } );

/////////////////////////////////////////////////

} );