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
	
////// Saber los dias de un mes

function diasMes(mm,yyyy){

	var dias;

	switch(mm) {
	    case 0:
	        dias = 31;
	        break;
	    case 1:
	        dias = 28;
	        break;
	    case 2:
	        dias = 31
	        break;
	    case 3:
	        dias = 30;
	        break;
	    case 4:
	        dias = 31;
	        break;
	    case 5:
	        dias = 30;
	        break;	 
	    case 6:
	        dias = 31;
	        break;	
	    case 7:
	        dias = 31;
	        break;	
	    case 8:
	        dias = 30;
	        break;	
	    case 9:
	        dias = 31;
	        break;	
	    case 10:
	        dias = 30;
	        break;	
	    case 11:
	        dias = 31;
	        break;
	}

	if ((((yyyy%100)!=0)&&((yyyy%4)==0))||((yyyy%400)==0)){
	  dias = dias + 1;
	 }

	return dias;
}