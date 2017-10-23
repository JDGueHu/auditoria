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

    };

    ///////////// Detalle de contrato
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