
///////////////////////////////// Saber los dias de un mes

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

///////////////////////////////////////////////////////////////////////


$(document).ready(function() {

    /////////////// Restringir fecha final con base en la inicial

    $( "#fechaInicio" ).change(function(){
        if($("#fechaInicio").val() != ""){

            //// Restringir la seleccion de fecha para la fecha de finalizacion ////
            var fecha = new Date($("#fechaInicio").val());
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
            document.getElementById("fechaFin").setAttribute("min", fecha); 

        }else{
            document.getElementById("fechaFin").setAttribute("readonly","readonly");
            $("#fechaFin").val('' );
            $("#dias").val('' ); // Borrar campo donde se calcula valor con base en fechas
        }

    });

    //////////////////////////////////////////////////////////////////////


});