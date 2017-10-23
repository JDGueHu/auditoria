$(document).ready(function() {

	// Activar fecha fina
	$( "#fechaInicioAusentismo" ).change(function() {
		document.getElementById("fechaFinAusentismo").removeAttribute("readonly");		
	});

	// restringir fecha finalizacion min fecha ini
    $( "#fechaInicioAusentismo" ).change(function(){
        if($("#fechaInicioAusentismo").val() != ""){

            //// Restringir la seleccion de fecha para la fecha de finalizacion ////
            var fecha = new Date($("#fechaInicioAusentismo").val());
            var dd = fecha.getDate()+1;
            var mm = fecha.getMonth()+1; //January is 0!
            var yyyy = fecha.getFullYear();
             if(dd<10){
                    dd='0'+dd
                } 
                if(mm<10){
                    mm='0'+mm
                } 

            fecha = yyyy+'-'+mm+'-'+dd;
            document.getElementById("fechaFinAusentismo").setAttribute("min", fecha); 

        }else{
            document.getElementById("fechaFinAusentismo").setAttribute("readonly","readonly");
            $("#fechaFinAusentismo").val('');
            $("#diasAusentismo").val('' ); // Borrar campo donde se calcula valor con base en fechas
        }

    });

	//////////////// Calcular dias de vacaciones
	$( "#fechaFinAusentismo" ).change(function() {

		var fechaInicio = new Date($("#fechaInicioAusentismo").val());
		var fechaFin = new Date($("#fechaFinAusentismo").val());

	    var dias = fechaFin.getTime() - fechaInicio.getTime() ;
	    dias = Math.round(dias/(1000 * 60 * 60 * 24));

	    $("#diasAusentismo").val(dias+1);
	    
    });

	///// Activar funcion de validacion
	$('.addRowAusentismo').on( 'click', function () {
		validarAusentismo(1);
	});

	$('.crearAusentismo').on( 'click', function () {
    	if($("#tipoIdentificacion").val() == ""){
    		$("#requeridoTipoIdentificacionEmpleado").removeClass( "ocultar" );
    		$("#requeridoIdentificacionEmpleado").removeClass( "ocultar" );
    	}else{
			$("#requeridoTipoIdentificacionEmpleado").addClass( "ocultar" );
			$("#requeridoIdentificacionEmpleado").addClass( "ocultar" );
    	}
		validarAusentismo(0);
	});

	//////////////// Quitar alertas requerido

	$( "#tipoVacacion" ).change(function(){
		if($("#tipoVacacion").val() != ""){
			$("#requeridoTipoVecaciones").addClass( "ocultar" );
		}
	});

	$( "#fechaInicioAusentismo" ).change(function(){
		if($("#fechaInicioAusentismo").val() != ""){
			$("#requeridoFechaIniVacaciones").addClass( "ocultar" );
		}
	});

	$( "#fechaFinAusentismo" ).change(function(){
		if($("#fechaFinAusentismo").val() != ""){
			$("#requeridoFechaFinVacaciones").addClass( "ocultar" );
		}
	});

	$( "#detallesAusentismo" ).change(function(){
		if($("#detallesAusentismo").val() != ""){
			$("#requeridoDetallesVacaciones").addClass( "ocultar" );
		}
	});

});

function validarAusentismo(ajax){ 

	if($("#tipoVacacion").val() == '' || $("#fechaInicioAusentismo").val() == '' || $("#fechaFinAusentismo").val() == '' || $("#detallesAusentismo").val() == ''){

		if($("#tipoVacacion").val() == ''){
			$("#requeridoTipoVecaciones").removeClass( "ocultar" );
		}

		if($("#fechaInicioAusentismo").val() == ''){
			$("#requeridoFechaIniVacaciones").removeClass( "ocultar" );
		}

		if($("#fechaFinAusentismo").val() == ''){
			$("#requeridoFechaFinVacaciones").removeClass( "ocultar" );
		}

		if($("#detallesAusentismo").val() == ''){
			$("#requeridoDetallesVacaciones").removeClass( "ocultar" );
		}

	}else{
		if (ajax == 0){
			$('#vacaciones').submit();
		}else{
			$.fn.crearAusentismoAjax(ajax);
		}	
	}

}