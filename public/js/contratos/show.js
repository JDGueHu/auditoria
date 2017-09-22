$( document ).ready(function() {

	if($("#fechaInicio").val() != ""){
		var fecha = new Date($("#fechaInicio").val());
		var dias = diasMes(fecha.getMonth()+1,fecha.getFullYear());
		fecha.setMonth(fecha.getMonth() + parseFloat($("#duracion").val()),fecha.getDate() + parseInt(dias*($("#duracion").val() - parseInt($("#duracion").val()))));
		var dd = fecha.getDate();
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
});