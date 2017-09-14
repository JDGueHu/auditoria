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


	///// Crear nuevo contrato AJAX

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

	///// Crear contrato AJAX - Subpanel
	$( "#crearContrato" ).click(function(){

		if($("#tipoContrato").val() == "" || $("#fechaInicio").val() == "" || $("#duracion").val() == ""){
			if($("#tipoContrato").val() == ""){
				$("#tipoContrato").addClass( "colorAlerta");
				$("#requeridoTipoContrato").removeClass( "ocultar" );
			}
			
			if($("#fechaInicio").val() == ""){
				$("#fechaInicio").addClass( "colorAlerta");
				$("#requeridoFechaIniContrato").removeClass( "ocultar" );
			}

			if($("#duracion").val() == ""){
				$("#duracion").addClass( "colorAlerta");
				$("#requeridoDuracionContrato").removeClass( "ocultar" );
			}
		}else{
	  	
	   	var data = "tipoContrato="+$("#tipoContrato").val()+"&fechaInicio="+$("#fechaInicio").val()+"&fechaFin="+$("#fechaFin").val()+"&duracion="+$("#duracion").val()+"&detalles="+$("#detalles").val()+"&empleado_id="+$("#empleado_id").val();
		var url = '../../../administracion/contratos/createAjax';

			$.ajax({
			  url: url,
			  headers: {'X-CSRF-TOKEN': $('input[name=_token]').val()},
			  type: 'POST',
			  datatype:'json',
			  data : data
			}).done(function(response){

				console.log(response);
			});
		}

	});

		///// Inputs subpanel Contratos

		$( "#tipoContrato" ).change(function(){

			if($("#tipoContrato").val() != ""){
				$("#tipoContrato").removeClass( "colorAlerta");
				$("#requeridoTipoContrato").addClass( "ocultar" );
			}
		});

		$( "#fechaInicio" ).change(function(){

			if($("#fechaInicio").val() != ""){
				$("#fechaInicio").removeClass( "colorAlerta");
				$("#requeridoFechaIniContrato").addClass( "ocultar" );
			}
		});

		$( "#duracion" ).change(function(){

			if($("#duracion").val() != ""){
				$("#duracion").removeClass( "colorAlerta");
				$("#requeridoDuracionContrato").addClass( "ocultar" );
			}
		});

		/////////////////////////////////////////////

	/////////////////////////////////////////////////////////////////////////




});
