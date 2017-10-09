$( document ).ready(function() {

	//// Calcular edad empleado con la fecha de nacimiento

	var fechaNacimiento = $("#fechaNacimiento").val();
    var hoy = new Date();
    var cumpleanos = new Date(fechaNacimiento);
    var edad = hoy.getFullYear() - cumpleanos.getFullYear();
    var m = hoy.getMonth() - cumpleanos.getMonth();

    if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
        edad--;
    }

    $("#edad").val(edad);

    /////////////////////////////////////////////////////////////////////////

	//// Calcular antiguedad empleado con la fecha de ingreso

	var fechaIngreso = $("#fechaIngreso").val();
    var hoy = new Date();
    var ingreso = new Date(fechaIngreso);

    var dias = hoy.getTime() - ingreso.getTime() ;
    dias = Math.round(dias/(1000 * 60 * 60 * 24));

    $("#antiguedad").val(dias-1);

    /////////////////////////////////////////////////////////////////////////

	///// Cargar el riesgo y su valor en el empleado
	  	
  	var data = "centroTrabajo="+$("#centroTrabajo").val();
	var url = '../../../administracion/empleados/cargarRiesgo';

  	if($("#centroTrabajo").val() != ""){
  	  			
		$.ajax({
		  url: url,
		  headers: {'X-CSRF-TOKEN': $('input[name=_token]').val()},
		  type: 'POST',
		  datatype:'json',
		  data : data
		}).done(function(response){

			$("#riesgo").val(response[0].riesgo);
			$("#tasa").val(response[0].valor);
				
		});
	}else{
			$("#riesgo").val("");
			$("#tasa").val("");
	}

	/////////////////////////////////////////////////////////////////////////

	//// Validar la fecha de retiro para que no pueda ser menor a la fecha de ingreso POR EVENTO

	$( "#fechaRetiro" ).change(function() {

		var fechaIngreso = new Date($("#fechaIngreso").val());
		var fechaRetiro = new Date($("#fechaRetiro").val());

		if (fechaRetiro < fechaIngreso){
			$.alert({
			    title: 'Alerta',
			    content: 'La fecha de retiro no puede ser menor a la fecha de ingreso',
			});

			$("#fechaRetiro").val("");
		}
	   
    });

    /////////////////////////////////////////////////////////////////////////


	///// Cargar riesgo del centro de trabajo

	$( "#centroTrabajo" ).change(function(){
	  	
	  	var data = "centroTrabajo="+$("#centroTrabajo").val();
		var url = '../../../administracion/empleados/cargarRiesgo';

	  	if($("#centroTrabajo").val() != ""){
	  	  			
			$.ajax({
			  url: url,
			  headers: {'X-CSRF-TOKEN': $('input[name=_token]').val()},
			  type: 'POST',
			  datatype:'json',
			  data : data
			}).done(function(response){
				$("#riesgo").val(response[0].riesgo);
				$("#tasa").val(response[0].valor);
					
			});
		}else{
				$("#riesgo").val("");
				$("#tasa").val("");
		}

	});

	/////////////////////////////////////////////////////////////////////////

});


	// function validaTipoContratoIndefinidoAjax(){  /// Funcion asincrona
		
	// 	var indefinido;

	//   	if($("#tipoContrato").val() != ""){
	  	  			
	// 		$.ajax({
	// 		  url: '../../../configuracion/tiposContrato/'+$("#tipoContrato").val()+'/indefinido',
	// 		  headers: {'X-CSRF-TOKEN': $('input[name=_token]').val()},
	// 		  type: 'GET',
	// 		}).done(function(response){
	// 			validaTipoContratoIndefinido(response)					
	// 		});
	// 	}else{
	// 		validaTipoContratoIndefinido(3);
	// 	}

	// }

	// function validaTipoContratoIndefinido(val){

	// 	if(val != 3){document.getElementById("fechaInicio").removeAttribute("readonly");}
	// 	else{
	// 		document.getElementById("fechaInicio").setAttribute("readonly","readonly");
	// 		$("#fechaInicio").val("");
	// 	}

	// 	if(val == 1){
	// 	 	document.getElementById("fechaInicio").removeAttribute("readonly");
	// 	 	document.getElementById("duracion").setAttribute("readonly","readonly");
	// 	 	$("#duracion").val( "" );
	// 	}else if(val == 0){
	// 	 	//document.getElementById("duracion").removeAttribute("readonly");
	// 	 }else{
	//  		document.getElementById("duracion").setAttribute("readonly","readonly");

	//  		$("#requeridoTipoContrato").addClass( "ocultar" );
	//  		$("#requeridoDuracionContrato").addClass( "ocultar" );
	//  		$("#requeridoFechaIniContrato").addClass( "ocultar" );
	//  		$("#requeridoEstadoContrato").addClass( "ocultar" );
	// 	 }
	// }

	// function validaTipoContratoFechaAjax(){  /// Funcion asincrona
		
	// 	var indefinido;

	//   	if($("#tipoContrato").val() != ""){
	  	  			
	// 		$.ajax({
	// 		  url: '../../../configuracion/tiposContrato/'+$("#tipoContrato").val()+'/indefinido',
	// 		  headers: {'X-CSRF-TOKEN': $('input[name=_token]').val()},
	// 		  type: 'GET',
	// 		}).done(function(response){
	// 			validaTipoContratoFecha(response)					
	// 		});
	// 	}else{
	// 		validaTipoContratoFecha(3);
	// 	}

	// }

	// function validaTipoContratoFecha(val){

	// 	if(val == 0){
	// 		if($("#fechaInicio").val() == ""){
	// 			document.getElementById("duracion").setAttribute("readonly","readonly");
	// 			$("#duracion").val( "" );
	// 		}else{
	// 	 	document.getElementById("duracion").removeAttribute("readonly");
	// 		}
	//     }else{
	//  		document.getElementById("duracion").setAttribute("readonly","readonly");
	// 		$("#duracion").val( "" );
	// 	 }
	// }