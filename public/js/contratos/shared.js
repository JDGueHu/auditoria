$(document).ready(function() {

	//////////////// VALIDACION DE RELACION ENTRE INPUTS 

	///// Validar campos cada vez que cambie en tipo de contrato

	$( "#tipoContrato" ).change(function(){

		if($("#tipoContrato").val() != ""){
			$("#requeridoTipoContrato").addClass( "ocultar" );
		}
		validaCampoTipoContrato();

	});

	///// Validar cada vez que cambie la fecha inicial

	$( "#fechaInicio" ).change(function(){

		if($("#fechaInicio").val() != ""){
			$("#requeridoFechaIniContrato").addClass( "ocultar" );
		}
		validaTipoContratoFechaAjax();
	});

	///// Validar cada vez que cambie la duracion

	$( "#duracion" ).change(function(){

		if($("#duracion").val() != ""){
			$("#requeridoDuracionContrato").addClass( "ocultar" );

			/// Calcular fecha de finalizacon contrato
			if($("#fechaInicio").val() != ""){
				var fecha = new Date($("#fechaInicio").val());
				var dias = diasMes(fecha.getMonth()+1,fecha.getFullYear());
				fecha.setMonth(fecha.getMonth() + parseFloat($("#duracion").val()),fecha.getDate() + parseInt(dias*($("#duracion").val() - parseInt($("#duracion").val()))));

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
				$("#fechaFin").val(fecha);
			}
		}

	});

	///// Validar cada vez que cambie el estado

	$( "#estadContrato" ).change(function(){

		if($("#estadContrato").val() != ""){
			$("#requeridoEstadoContrato").addClass( "ocultar" );
		}
	});

	// ------------------------------------------------ //

    /// Validaciones y creacion de contrato

    $('.botonCrearContrato').on( 'click', function () {
    	if($("#tipoIdentificacion").val() == ""){
    		$("#requeridoTipoIdentificacionEmpleado").removeClass( "ocultar" );
    		$("#requeridoIdentificacionEmpleado").removeClass( "ocultar" );
    	}else{
			$("#requeridoTipoIdentificacionEmpleado").addClass( "ocultar" );
			$("#requeridoIdentificacionEmpleado").addClass( "ocultar" );
    	}
    	validarTipoContratoCrear(0);
    } );

    $('.botonEditarTop').on( 'click', function () {
    	if($("#tipoIdentificacion").val() == ""){
    		$("#requeridoTipoIdentificacionEmpleado").removeClass( "ocultar" );
    		$("#requeridoIdentificacionEmpleado").removeClass( "ocultar" );
    	}else{
			$("#requeridoTipoIdentificacionEmpleado").addClass( "ocultar" );
			$("#requeridoIdentificacionEmpleado").addClass( "ocultar" );
    	}
    	validarTipoContratoCrear(0);
    } );

});

// Consultar si el contrato es indefinido - Cambio de tipo de contrato
function validaCampoTipoContrato(){  

  	var pathname = window.location.pathname;
  	var url;

  	if(pathname.substring(pathname.length - 4, pathname.length) == "edit"){
  		url = '../../../configuracion/tiposContrato/'+$("#tipoContrato").val()+'/indefinido';
  	}else{
  		url = '../../configuracion/tiposContrato/'+$("#tipoContrato").val()+'/indefinido';
  	}

  	if($("#tipoContrato").val() != ""){
  	  			
		$.ajax({
		  url: url,
		  headers: {'X-CSRF-TOKEN': $('input[name=_token]').val()},
		  type: 'GET',
		}).done(function(response){
			validaTipoContratoIndefinido(response)					
		});
	}else{
		validaTipoContratoIndefinido(2);
	}

}

// Aplicar validaciones a inputs - Cambio de tipo de contrato
function validaTipoContratoIndefinido(val){

	if(val != 2){document.getElementById("fechaInicio").removeAttribute("readonly");}

	if(val == 1){
	 	document.getElementById("duracion").setAttribute("readonly","readonly");
	 	$("#duracion").val( "" );
	}else if(val == 2){
	 	document.getElementById("fechaInicio").setAttribute("readonly","readonly");
	 	$("#fechaInicio").val( "" );
	 	document.getElementById("duracion").setAttribute("readonly","readonly");
	 	$("#duracion").val( "" );
	 	$("#fechaFin").val( "" );
	 }else{
 		document.getElementById("fechaFin").setAttribute("readonly","readonly");
		$("#fechaFin").val("");

 		$("#requeridoTipoContrato").addClass( "ocultar" );
 		$("#requeridoDuracionContrato").addClass( "ocultar" );
 		$("#requeridoFechaIniContrato").addClass( "ocultar" );
 		$("#requeridoEstadoContrato").addClass( "ocultar" );
	 }
}

// Consultar si el contrato es indefinido - Cambio de fecha inicial
function validaTipoContratoFechaAjax(){ 
	
	var indefinido;

  	if($("#tipoContrato").val() != ""){

	  	var pathname = window.location.pathname;
	  	var url;

	  	if(pathname.substring(pathname.length - 4, pathname.length) == "edit"){
	  		url = '../../../configuracion/tiposContrato/'+$("#tipoContrato").val()+'/indefinido';
	  	}else{
	  		url = '../../configuracion/tiposContrato/'+$("#tipoContrato").val()+'/indefinido';
	  	}
  	  			
		$.ajax({
		  url: url,
		  headers: {'X-CSRF-TOKEN': $('input[name=_token]').val()},
		  type: 'GET',
		}).done(function(response){
			validaTipoContratoFecha(response)					
		});
	}else{
		validaTipoContratoFecha(2);
	}

}

// Aplicar validaciones a inputs - Cambio de fecha inicial
function validaTipoContratoFecha(val){
	
	if(val == 0){
		if($("#fechaInicio").val() == ""){
			document.getElementById("duracion").setAttribute("readonly","readonly");
			$("#duracion").val( "" );
		}else{
	 	document.getElementById("duracion").removeAttribute("readonly");
		}
    }
}

// Consultar si el contrato es indefinido - Crear contrato
function validarTipoContratoCrear(ajax){  /// Funcion asincrona

  	var pathname = window.location.pathname;
  	var url;

  	if(pathname.substring(pathname.length - 4, pathname.length) == "edit"){
  		url = '../../../configuracion/tiposContrato/'+$("#tipoContrato").val()+'/indefinido';
  	}else{
  		url = '../../configuracion/tiposContrato/'+$("#tipoContrato").val()+'/indefinido';
  	}

	if($("#tipoContrato").val() == ""){
		$("#tipoContrato").focus();
		$("#requeridoTipoContrato").removeClass( "ocultar" );
	}else{
		$.ajax({
		  url: url,
		  headers: {'X-CSRF-TOKEN': $('input[name=_token]').val()},
		  type: 'GET',
		}).done(function(response){
			crearContrato(response, ajax)					
		});
	}
}


function crearContrato(val, ajax){
	//alert(ajax);
	if(val == 1){
		document.getElementById("duracion").setAttribute("readonly","readonly");
		if($("#fechaInicio").val() == "" || $("#estadContrato").val() == ""){		 	

			if($("#estadContrato").val() == ""){
				$("#estadContrato").focus();
				$("#requeridoEstadoContrato").removeClass( "ocultar" );
			}

			if($("#fechaInicio").val() == ""){
				$("#fechaInicio").focus();
				$("#requeridoFechaIniContrato").removeClass( "ocultar" );
			}

		}else{
			if (ajax == 0){
				$("#contrato").submit();
			}else{
				$.fn.crearContratoAjax();
			}
		}
	}else{

		if($("#fechaInicio").val() == "" || $("#estadContrato").val() == "" || $("#duracion").val() == ""){		 	

			if($("#estadContrato").val() == ""){
				$("#estadContrato").focus();
				$("#requeridoEstadoContrato").removeClass( "ocultar" );
			}

			if($("#duracion").val() == ""){
				$("#duracion").focus();
				$("#requeridoDuracionContrato").removeClass( "ocultar" );
			}

			if($("#fechaInicio").val() == ""){
				$("#fechaInicio").focus();
				$("#requeridoFechaIniContrato").removeClass( "ocultar" );
			}
		}else{
			if (ajax == 0){
				$("#contrato").submit();
			}else{
				$.fn.crearContratoAjax();
			}
		}
	}

}