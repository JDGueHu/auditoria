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

///////////// Detalle de contrato

    $('#inlineSST tbody').on( 'click', '.buttonDetailSST', function () {

        var  cadena = $(this).parents('tr').children().eq(0).text();
        var array = cadena.split("-");

        $.ajax({
              url: '../../administracion/SST/'+array[1]+'/showAjax',
              type: 'GET'
            }).done(function(response){
                
                $(".addRow").addClass("ocultar");
                $(".editRow").addClass("ocultar");
                
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