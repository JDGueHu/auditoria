$(document).ready(function() {


	$( "#tipoExamen" ).change(function(){
    	if($("#tipoExamen").val() != ""){
    		$("#requeridoTipoExamen").addClass( "ocultar" );
    	}
	});

	$( "#fechaExamen" ).change(function(){
    	if($("#fechaExamen").val() != ""){
    		$("#requeridoFechaExamen").addClass( "ocultar" );
    	}
	});

	$( "#concepto" ).change(function(){
    	if($("#concepto").val() != ""){
    		$("#requeridoConceptoExamen").addClass( "ocultar" );
    	}
	});

	$('.validarButton').on( 'click', function () {
		if ($('#tipoIdentificacion').val() == '' || $('#tipoExamen').val() == '' || $('#fechaExamen').val() == '' || $('#concepto').val() == '') {
			if ($('#tipoIdentificacion').val() == '') {
	    		$("#requeridoTipoIdentificacionEmpleado").removeClass( "ocultar" );
	    		$("#requeridoIdentificacionEmpleado").removeClass( "ocultar" );
			}
			if ($('#tipoExamen').val() == '') {
	    		$("#requeridoTipoExamen").removeClass( "ocultar" );
			}
			if ($('#fechaExamen').val() == '') {
	    		$("#requeridoFechaExamen").removeClass( "ocultar" );
			}
			if ($('#concepto').val() == '') {
	    		$("#requeridoConceptoExamen").removeClass( "ocultar" );
			}
		} else {
			$('#examen').submit();
		}
	});

});
