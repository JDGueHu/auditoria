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

			console.log(response);

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

});