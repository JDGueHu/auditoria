$(document).ready(function() {

	///// Activar funcion de validacion
	$('.addRowAdjunto').on( 'click', function () {
		validarAdjunto(1);
	});

	$('.crearAdjunto').on( 'click', function () {
    	if($("#tipoIdentificacion").val() == ""){
    		$("#requeridoTipoIdentificacionEmpleado").removeClass( "ocultar" );
    		$("#requeridoIdentificacionEmpleado").removeClass( "ocultar" );
    	}else{
			$("#requeridoTipoIdentificacionEmpleado").addClass( "ocultar" );
			$("#requeridoIdentificacionEmpleado").addClass( "ocultar" );
    	}
		validarAdjunto(0);
	});


	//////////////// Quitar alertas requerido
	$( "#nombre" ).change(function(){
		if($("#nombre").val() != ""){
			$("#requeridoNombreAdjunto").addClass( "ocultar" );
		}
	});

	$( "#adjuntoAdjunto" ).change(function(){
		if($("#adjuntoAdjunto").val() != ""){
			$("#requeridoRutaAdjunto").addClass( "ocultar" );
		}
	});

});

function validarAdjunto(ajax){ 

	if($("#nombre").val() == '' || $("#adjuntoAdjunto").val() == ''){

		if($("#nombre").val() == ''){
			$("#requeridoNombreAdjunto").removeClass( "ocultar" );
		}

		if($("#adjuntoAdjunto").val() == ''){
			$("#requeridoRutaAdjunto").removeClass( "ocultar" );
		}

	}else{
		if (ajax == 0){
			$('#crearAdjunto').submit();
		}else{
			$.fn.crearAdjuntoAjax(ajax);
		}
	}

}