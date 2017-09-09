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

	//// Calcular antiguedad empleadoal seleccionar la fecha de de ingreso
	$( "#fechaIngreso" ).change(function() {

		var fechaIngreso = $("#fechaIngreso").val();
	    var hoy = new Date();
	    var ingreso = new Date(fechaIngreso);

	    var dias = hoy.getTime() - ingreso.getTime() ;
	    dias = Math.round(dias/(1000 * 60 * 60 * 24));

	    $("#antiguedad").val(dias-1);
    });

    /////////////////////////////////////////////////////////////////////////

});
