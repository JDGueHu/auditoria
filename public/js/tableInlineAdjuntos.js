$(document).ready(function() {
    var t = $('#inlineAdjuntos').DataTable({

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
     $('#nuevoAdjunto').on( 'click', function () {

        $(".addRowAdjunto").removeClass("ocultar");
        $(".editRowAdjunto").addClass("ocultar");
        $(".ocultarShowAdjunto").removeClass("ocultar");

        $("#nombre").val("");
        $("#adjuntoAdjunto").val("");
        $("#detallesAdjunto").val("");

    } );

    // Crear adjunto
    $.fn.crearAdjuntoAjax = function(tipoCreacion) {

        var identificacion = $('#identificacion').val();
        var nombre = $('#nombre').val();   
        var adjunto = $('#adjuntoAdjunto').prop('files')[0];
        var detallesAdjunto = $('#detallesAdjunto').val();      

        var form_data = new FormData();
        form_data.append('identificacion', identificacion);
        form_data.append('nombre', nombre);
        form_data.append('adjunto', adjunto);
        form_data.append('detallesAdjunto', detallesAdjunto);

        $.ajax({
          url: '../../administracion/adjuntos/createAjax',
          headers: {'X-CSRF-TOKEN': $('input[name=_token]').val()},
          type: 'POST',
          datatype:'json',
          contentType: false,
          cache: false,
          processData: false,
          data : form_data
        }).done(function(response){
            console.log(response);

            t.row.add( [
                response[0].nombre+'<span style="opacity:0">-'+response[0].id+'</span>',
                '<a title="Adjunto" href="'+response[0].adjunto+'" target="_blank"><i class="fa fa-file" aria-hidden="true"></i> Archivo adjunto</a>',
                '<a title="Detalles" class="btn btn-default btn-xs buttonDetailAdjunto"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp;<a title="Eliminar" class="btn btn-danger btn-xs buttonDestroyAdjunto"><i class="fa fa-trash-o" aria-hidden="true"></i></a>'
            ] ).draw( false );

            $("#nombre").val("");
            $("#adjunto").val("");
            $("#detallesAdjunto").val("");
            $('#modalAdjunto').modal('toggle');

        });

    };

    // Eliminar ausentismo       
    $('#inlineAdjuntos tbody').on( 'click', '.buttonDestroyAdjunto', function () {

        var validate = confirm('Va a eliminar un adjunto ¿Desea continuar?');

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
                  url: '../../administracion/adjuntos/'+array[1]+'/destroyAjax',
                  type: 'GET'
                }).done(function(response){
                  //console.log(response);
                  t.row('.eliminar').remove().draw( false );
                });
        }

    });

    ////// Detalle de contrato
    $('#inlineAdjuntos tbody').on( 'click', '.buttonDetailAdjunto', function () {

        $(".ocultarShowAdjunto").addClass("ocultar");

        var  cadena = $(this).parents('tr').children().eq(0).text();
        var array = cadena.split("-");

        $.ajax({
              url: '../../administracion/adjuntos/'+array[1]+'/showAjax',
              type: 'GET'
            }).done(function(response){
                
                $(".addRowAdjunto").addClass("ocultar");
                $(".editRowAdjunto").addClass("ocultar");
                
                document.getElementById("nombre").setAttribute("readonly","readonly");
                document.getElementById("detallesAdjunto").setAttribute("readonly","readonly");

                $('#modalAdjunto').modal('show');   
                $("#nombre").val(response.nombre);
                $("#linkHref").attr("href", response.ruta)
                $("#ruta").text(response.ruta);
                $("#detallesAdjunto").val(response.detalles);

            });
    } );

} );