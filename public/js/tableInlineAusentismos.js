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

///////////// Detalle de contrato

    $('#inlineAusentismos tbody').on( 'click', '.buttonDetailFormaciones', function () {

        var  cadena = $(this).parents('tr').children().eq(0).text();
        var array = cadena.split("-");

        $.ajax({
              url: '../../administracion/vacaciones/'+array[1]+'/showAjax',
              type: 'GET'
            }).done(function(response){
                
                $(".addRow").addClass("ocultar");
                $(".editRow").addClass("ocultar");

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