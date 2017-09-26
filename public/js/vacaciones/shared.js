$(document).ready(function() {

	//////////////// Calcular dias de vacaciones

	$( "#fechaFin" ).change(function() {

		var fechaInicio = new Date($("#fechaInicio").val());
		var fechaFin = new Date($("#fechaFin").val());

	    var dias = fechaFin.getTime() - fechaInicio.getTime() ;
	    dias = Math.round(dias/(1000 * 60 * 60 * 24));

	    $("#dias").val(dias);
	    
    });

    ///////////////////////////////////////////////

	//////////////// Validar inputs

    $('.validateForm').on( 'click', function () {
		if($("#tipoIdentificacion").val() == '' || $("#tipoVacacion").val() == '' || $("#fechaInicio").val() == '' || $("#fechaFin").val() == '' || $("#detalles").val() == ''){

			if($("#tipoIdentificacion").val() == ''){
				$("#requeridoTipoIdentificacionEmpleado").removeClass( "ocultar" );
				$("#requeridoIdentificacionEmpleado").removeClass( "ocultar" );
			}

			if($("#tipoVacacion").val() == ''){
				$("#requeridoTipoVecaciones").removeClass( "ocultar" );
			}

			if($("#fechaInicio").val() == ''){
				$("#requeridoFechaIniVacaciones").removeClass( "ocultar" );
			}

			if($("#fechaFin").val() == ''){
				$("#requeridoFechaFinVacaciones").removeClass( "ocultar" );
			}

			if($("#detalles").val() == ''){
				$("#requeridoDetallesVacaciones").removeClass( "ocultar" );
			}

		}else{
			$('#createVacaciones').submit();
		}
	} );

	///////////////////////////////////////////////

	//////////////// Quitar alertas requerido

	$( "#tipoVacacion" ).change(function(){
		if($("#tipoVacacion").val() != ""){
			$("#requeridoTipoVecaciones").addClass( "ocultar" );
		}
	});

	$( "#fechaInicio" ).change(function(){
		if($("#fechaInicio").val() != ""){
			$("#requeridoFechaIniVacaciones").addClass( "ocultar" );
		}
	});

	$( "#fechaFin" ).change(function(){
		if($("#fechaFin").val() != ""){
			$("#requeridoFechaFinVacaciones").addClass( "ocultar" );
		}
	});

	$( "#detalles" ).change(function(){
		if($("#detalles").val() != ""){
			$("#requeridoDetallesVacaciones").addClass( "ocultar" );
		}
	});

	///////////////////////////////////////////////

});