$(document).ready(function() {

	///// Activar funcion de validacion
	$('.addRow_sst').on( 'click', function () {
		validar_sst(1);
	});

	$('.crear_sst').on( 'click', function () {
    	if($("#tipoIdentificacion").val() == ""){
    		$("#requeridoTipoIdentificacionEmpleado").removeClass( "ocultar" );
    		$("#requeridoIdentificacionEmpleado").removeClass( "ocultar" );
    	}else{
			$("#requeridoTipoIdentificacionEmpleado").addClass( "ocultar" );
			$("#requeridoIdentificacionEmpleado").addClass( "ocultar" );
    	}
		validar_sst(0);
	});

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

	$( "#detallesSST" ).change(function(){
		if($("#detallesSST").val() != ""){
			$("#requeridoDetallesSST").addClass( "ocultar" );
		}
	});

	///////////////////////////////////////////////

});

function validar_sst(ajax){ 

	if( $("#tipoSST_id").val() == '' || $("#fechaSST").val() == '' || $("#causaPrincipal_id").val() == '' || $("#detallesSST").val() == ''){

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
		if (ajax == 0){
			$('#crearSST').submit();
		}else{
			$.fn.crear_sst_Ajax(ajax);
		}	
	}

}