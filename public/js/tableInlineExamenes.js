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

    var tR = $('#inlineRestriccionesMedicas').DataTable({

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

///////////// Detalle de contrato

    $('#inlineExamenes tbody').on( 'click', '.buttonDetailExamenes', function () {

        var  cadena = $(this).parents('tr').children().eq(0).text();
        var array = cadena.split("-");

        $.ajax({
              url: '../../administracion/examenes/'+array[1]+'/showAjax',
              type: 'GET'
            }).done(function(response){
                
                $(".addRow").addClass("ocultar");
                $(".editRow").addClass("ocultar");        
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
                                item.restriccion
                            ] ).draw( false );
                        });

                    });



            });
    } );

/////////////////////////////////////////////////

} );