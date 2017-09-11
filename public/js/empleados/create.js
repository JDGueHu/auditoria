$( document ).ready(function() {

	//// Calcular edad empleado al seleccionar la fecha de nacimiento
	$( "#fechaNacimiento" ).change(function() {

		var fechaNacimiento = $("#fechaNacimiento").val();
	    var hoy = new Date();
	    var cumpleanos = new Date(fechaNacimiento);
	    var edad = hoy.getFullYear() - cumpleanos.getFullYear();
	    var m = hoy.getMonth() - cumpleanos.getMonth();

	    if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
	        edad--;
	    }

	    $("#edad").val(edad);
    });

    /////////////////////////////////////////////////////////////////////////

	//// Calcular antiguedad empleadoal seleccionar la fecha de ingreso
	$( "#fechaIngreso" ).change(function() {

		var fechaIngreso = $("#fechaIngreso").val();
	    var hoy = new Date();
	    var ingreso = new Date(fechaIngreso);

	    var dias = hoy.getTime() - ingreso.getTime() ;
	    dias = Math.round(dias/(1000 * 60 * 60 * 24));

	    $("#antiguedad").val(dias-1);
    });

    /////////////////////////////////////////////////////////////////////////

	///// Cargar el riesgo y su valor en el empleado
	$( "#centroTrabajo" ).change(function(){
	  	
	  	var data = "centroTrabajo="+$("#centroTrabajo").val();
		var pathname = window.location.pathname;
		var url;

	  	if(pathname.substring(pathname.length - 4, pathname.length) == "edit"){
	  		url = '../../../administracion/empleados/cargarRiesgo';
	  	}else{
	  		url = '../../administracion/empleados/cargarRiesgo';
	  	}

	  	if($("#centroTrabajo").val() != ""){
	  	  			
			$.ajax({
			  url: url,
			  headers: {'X-CSRF-TOKEN': $('input[name=_token]').val()},
			  type: 'POST',
			  datatype:'json',
			  data : data
			}).done(function(response){

				console.log(response);

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
