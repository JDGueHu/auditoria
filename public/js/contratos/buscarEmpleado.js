$( document ).ready(function() {
    $('#example tbody').on( 'click', '.empleadoSel', function () {

    	$('#nombreEmpleado').text($(this).parents('tr').children().eq(2).text()+" "+$(this).parents('tr').children().eq(3).text());
    	$('#tipoIdentificacion').val($(this).parents('tr').children().eq(0).text());
    	$('#identificacion').val($(this).parents('tr').children().eq(1).text());

		$("#requeridoTipoIdentificacionEmpleado").addClass( "ocultar" );
		$("#requeridoIdentificacionEmpleado").addClass( "ocultar" );

    	$('#exampleModalLong').modal('toggle');
    	
	});

} );