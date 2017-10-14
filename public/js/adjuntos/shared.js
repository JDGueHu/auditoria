$(document).ready(function() {


	//////////////// Validar inputs

    $('.validateForm').on( 'click', function () {
    	// var pathname = window.location.pathname;
    	// alert(pathname);
		if($("#tipoIdentificacion").val() == '' || $("#nombre").val() == '' || $("#adjunto").val() == ''){

			if($("#tipoIdentificacion").val() == ''){
				$("#requeridoTipoIdentificacionEmpleado").removeClass( "ocultar" );
				$("#requeridoIdentificacionEmpleado").removeClass( "ocultar" );
			}

			if($("#nombre").val() == ''){
				$("#requeridoNombreAdjunto").removeClass( "ocultar" );
			}

			if($("#adjunto").val() == ''){
				$("#requeridoRutaAdjunto").removeClass( "ocultar" );
			}

		}else{
			$('#crearAdjunto').submit();
		}
	} );

	///////////////////////////////////////////////

	//////////////// Quitar alertas requerido

	$( "#nombre" ).change(function(){
		if($("#nombre").val() != ""){
			$("#requeridoNombreAdjunto").addClass( "ocultar" );
		}
	});

	$( "#adjunto" ).change(function(){
		if($("#adjunto").val() != ""){
			$("#requeridoRutaAdjunto").addClass( "ocultar" );
		}
	});


	///////////////////////////////////////////////

});