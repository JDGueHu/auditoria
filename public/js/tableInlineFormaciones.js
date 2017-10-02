$(document).ready(function() {
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

///////////// Detalle de contrato

    $('#inlineFormaciones tbody').on( 'click', '.buttonDetailAusentismo', function () {

        var  cadena = $(this).parents('tr').children().eq(1).text();
        var array = cadena.split("-");

        $.ajax({
              url: '../../administracion/formaciones/'+array[1]+'/showAjax',
              type: 'GET'
            }).done(function(response){
                
                $(".addRow").addClass("ocultar");
                $(".editRow").addClass("ocultar");

                $("#tipoEstudio").prop( "disabled", true );
                $("#intExt").prop( "disabled", true );
                $("#nivelEstudio_id").prop( "disabled", true );
                $("#areaEstudio_id").prop( "disabled", true );
                document.getElementById("titulacion").setAttribute("readonly","readonly");
                document.getElementById("institucionEducativa").setAttribute("readonly","readonly");
                $("#estadoFormacion").prop( "disabled", true );
                document.getElementById("fechaInicioFormacion").setAttribute("readonly","readonly");
                document.getElementById("fechaFinFormacion").setAttribute("readonly","readonly");
                document.getElementById("ciudadFormacion").setAttribute("readonly","readonly");

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
                $("#ciudadFormacion").val(response[0].ciudadEstudio);

            });
    } );

/////////////////////////////////////////////////

} );