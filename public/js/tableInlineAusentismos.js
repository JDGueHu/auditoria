$(document).ready(function() {
    var t = $('#inlineAusentismos').DataTable({

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
    $('#nuevoVacaciones').on( 'click', function () {
        $(".addRowAusentismo").removeClass("ocultar");
        $(".editRowAusentismo").addClass("ocultar");
        $(".ocultarShowAusentismo").removeClass("ocultar");

        $("#tipoVacacion").val("");
        $("#fechaInicioAusentismo").val("");
        $("#fechaFinAusentismo").val("");
        $("#diasAusentismo").val("");
        $("#adjuntoAusentismo").val('');
        $("#detallesAusentismo").val("");

    } );


    ///// Crear ausentismo Ajax
    $.fn.crearAusentismoAjax = function(tipoCreacion) {

        var identificacion = $('#identificacion').val();
        var tipoVacacion = $('#tipoVacacion').val();
        var fechaInicioAusentismo = $('#fechaInicioAusentismo').val();  
        var fechaFinAusentismo = $('#fechaFinAusentismo').val();     
        var adjunto = $('#adjuntoAusentismo').prop('files')[0];
        var detallesAusentismo = $('#detallesAusentismo').val();      

        var form_data = new FormData();
        form_data.append('identificacion', identificacion);
        form_data.append('tipoVacacion', tipoVacacion);
        form_data.append('fechaInicioAusentismo', fechaInicioAusentismo);
        form_data.append('fechaFinAusentismo', fechaFinAusentismo);
        form_data.append('adjunto', adjunto);
        form_data.append('detallesAusentismo', detallesAusentismo);

        $.ajax({
          url: '../../administracion/vacaciones/createAjax',
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
                response[0].tipoVacaciones+'<span style="opacity:0">-'+response[0].id+'</span>',
                response[0].fechaFin,
                response[0].fechaFin,
                '<a title="Adjunto" href="'+response[0].adjunto+'" target="_blank"><i class="fa fa-file" aria-hidden="true"></i> Archivo adjunto</a>',
                '<a title="Detalles" class="btn btn-default btn-xs buttonDetailAusentismo"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp;<a title="Eliminar" class="btn btn-danger btn-xs buttonDestroyAusentismo"><i class="fa fa-trash-o" aria-hidden="true"></i></a>'
            ] ).draw( false );

            $("#tipoVacacion").val("");
            $("#fechaInicioAusentismo").val("");
            $("#fechaFinAusentismo").val("");
            $("#adjuntoAusentismo").val("");
            $("#detallesAusentismo").val("");
            $('#modalAusentismo').modal('toggle');
        });
    };

    // Eliminar ausentismo       
    $('#inlineAusentismos tbody').on( 'click', '.buttonDestroyAusentismo', function () {

        var validate = confirm('Va a eliminar un ausentismo ¿Desea continuar?');

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
                  url: '../../administracion/vacaciones/'+array[1]+'/destroyAjax',
                  type: 'GET'
                }).done(function(response){
                    //console.log(response);
                  t.row('.eliminar').remove().draw( false );
                });
        }

    });

    //// Detalle de contrato
    $('#inlineAusentismos tbody').on( 'click', '.buttonDetailAusentismo', function () {

        $(".ocultarShowAusentismo").addClass("ocultar");

        var  cadena = $(this).parents('tr').children().eq(0).text();
        var array = cadena.split("-");

        $.ajax({
              url: '../../administracion/vacaciones/'+array[1]+'/showAjax',
              type: 'GET'
            }).done(function(response){
                
                $(".addRowAusentismo").addClass("ocultar");
                $(".editRowAusentismo").addClass("ocultar");

                $("#tipoVacacion").prop( "disabled", true );
                document.getElementById("fechaInicioAusentismo").setAttribute("readonly","readonly");
                document.getElementById("fechaFinAusentismo").setAttribute("readonly","readonly");
                document.getElementById("diasAusentismo").setAttribute("readonly","readonly");
                document.getElementById("detallesAusentismo").setAttribute("readonly","readonly");

                $('#modalAusentismo').modal('show');   
                $("#tipoVacacion").val(response.tipoVacaciones_id);
                $("#fechaInicioAusentismo").val(response.fechaInicio);
                $("#fechaFinAusentismo").val(response.fechaFin);

                var fechaInicio = new Date($("#fechaInicioAusentismo").val());
                var fechaFin = new Date($("#fechaFinAusentismo").val());

                var dias = fechaFin.getTime() - fechaInicio.getTime() ;
                dias = Math.round(dias/(1000 * 60 * 60 * 24));

                $("#diasAusentismo").val(dias);
                $("#detallesAusentismo").val(response.detalles);

            });
    } );

/////////////////////////////////////////////////

} );