$(document).ready(function() {


	//////////////// Validar inputs

    $('.validateForm').on( 'click', function () {
		if($("#tipoIdentificacion").val() == '' || $("#tipoSST_id").val() == '' || $("#fechaSST").val() == '' || $("#causaPrincipal_id").val() == '' || $("#detalles").val() == ''){

			if($("#tipoIdentificacion").val() == ''){
				$("#requeridoTipoIdentificacionEmpleado").removeClass( "ocultar" );
				$("#requeridoIdentificacionEmpleado").removeClass( "ocultar" );
			}

			if($("#tipoSST_id").val() == ''){
				$("#requeridoTipoSST").removeClass( "ocultar" );
			}

			if($("#fechaSST").val() == ''){
				$("#requeridoFechaSST").removeClass( "ocultar" );
			}

			if($("#causaPrincipal_id").val() == ''){
				$("#requeridoCausaPrinSST").removeClass( "ocultar" );
			}

			if($("#detalles").val() == ''){
				$("#requeridoDetallesSST").removeClass( "ocultar" );
			}

		}else{
			$('#crearSST').submit();
		}
	} );

	///////////////////////////////////////////////

	//////////////// Quitar alertas requerido

	$( "#tipoSST_id" ).change(function(){
		if($("#tipoSST_id").val() != ""){
			$("#requeridoTipoSST").addClass( "ocultar" );
		}
	});

	$( "#fechaSST" ).change(function(){
		if($("#fechaSST").val() != ""){
			$("#requeridoFechaSST").addClass( "ocultar" );
		}
	});

	$( "#causaPrincipal_id" ).change(function(){
		if($("#causaPrincipal_id").val() != ""){
			$("#requeridoCausaPrinSST").addClass( "ocultar" );
		}
	});

	$( "#detalles" ).change(function(){
		if($("#detalles").val() != ""){
			$("#requeridoDetallesSST").addClass( "ocultar" );
		}
	});

	///////////////////////////////////////////////

});