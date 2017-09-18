$( document ).ready(function() {

	//// Restringir la seleccion de fecha hasta la fecha actual en Empleados ////
	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth()+1; //January is 0!
	var yyyy = today.getFullYear();
	 if(dd<10){
	        dd='0'+dd
	    } 
	    if(mm<10){
	        mm='0'+mm
	    } 

	today = yyyy+'-'+mm+'-'+dd;
	document.getElementById("fechaNacimiento").setAttribute("max", today);
	document.getElementById("fechaIngreso").setAttribute("max", today);

	//////////////////////////////////////////////////////////////////////


});
	