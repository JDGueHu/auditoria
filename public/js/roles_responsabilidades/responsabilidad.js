$(document).ready(function() {

    var t =$('#example').DataTable({
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
        pageLength: 6    
    });


    ////////// Crear responsabilidad
	$('#addResponsabilidad').on( 'click', function () {

		if ($('#responsabilidad').val() == '') {
    		$("#requeridoResponsabilidad").removeClass( "ocultar" );
		} else {
			$("#requeridoResponsabilidad").addClass("ocultar");
			
			var responsabilidad = $('#responsabilidad').val();
			var tmp = $('#tmp').val();

        	var form_data = new FormData();
        	form_data.append('responsabilidad', responsabilidad);
        	form_data.append('tmp', tmp);

            var pathname = window.location.pathname;
            var url;

            if(pathname.substring(pathname.length - 4, pathname.length) == "edit"){
                url = '../../../matrices/roles/createResponsabilidadAjax';
            }else{
                url = '../../matrices/roles/createResponsabilidadAjax';
            }

	        $.ajax({
	          url: url,
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
	                response.responsabilidad+'<span style="opacity:0">-'+response.id+'</span>',
	               '<a title="Eliminar" class="btn btn-danger btn-xs buttonDestroyResponsabilidad"><i class="fa fa-trash-o" aria-hidden="true"></i></a>'
	            ] ).draw( false );

	            $("#responsabilidad").val("");

	        });

		}
	});

	///////// Eliminar responsabilidad
	    // Eliminar restriccion medica en tabla         
    $('#example tbody').on( 'click', '.buttonDestroyResponsabilidad ', function () {

        var  cadena = $(this).parents('tr').children().eq(0).text();
        var array = cadena.split("-");

        if ( $(this).parents('tr').hasClass('eliminarResponsabilidad') ) {
            $(this).parents('tr').removeClass('eliminarResponsabilidad');
        }
        else {
            t.$('tr.eliminarResponsabilidad').removeClass('eliminarResponsabilidad');
            $(this).parents('tr').addClass('eliminarResponsabilidad');
        }   

        $.confirm({
            title: 'Eliminar',
            content: 'Va a eliminar una responsabilidad ¿Desea continuar?',
            buttons: {
                ok: function () {

                    var pathname = window.location.pathname;
                    var url;

                    if(pathname.substring(pathname.length - 4, pathname.length) == "edit"){
                        url = '../../../matrices/roles/'+array[1]+'/destroyResponsabilidadAjax';
                    }else{
                        url = '../../matrices/roles/'+array[1]+'/destroyResponsabilidadAjax';
                    }

                    $.ajax({
                      url: url,
                      type: 'GET'
                    }).done(function(response){
                      //console.log(response);
                      t.row('.eliminarResponsabilidad').remove().draw( false );
                    });
                },
                cancel: function () {}
            }
        });
    });

});