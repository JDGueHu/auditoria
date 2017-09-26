$(document).ready(function() {

	//////////////// Calcular dias de vacaciones

		var fechaInicio = new Date($("#fechaInicio").val());
		var fechaFin = new Date($("#fechaFin").val());

	    var dias = fechaFin.getTime() - fechaInicio.getTime() ;
	    dias = Math.round(dias/(1000 * 60 * 60 * 24));

	    $("#dias").val(dias);

	///////////////////////////////////////////////////
	    
});