
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

    //// Para validar registro duplicado en todos los modulos
    $( ".validarDuplicado" ).change(function(){

        if ($('.validarDuplicado').val() == ''){

            //// SE ELIMINAN TODOS LOS ELEMENTOS FRONT cuando el campo está vacio

            //Ocultar contenido de validacion de error si hubo una previamente
            $(".duplicado").removeClass("has-success");
            $('#inputSuccess1Status').addClass("ocultar");
            $('#inputSuccess2Status').addClass("ocultar");

            //Ocultar contenido de validacion de error si hubo una previamente
            $(".duplicado").removeClass("has-error");
            $('#inputError1Status').addClass("ocultar");
            $('#inputError2Status').addClass("ocultar");

        }
        else{

            var modulo = $('#modulo').val();
            var dato = $(this).val();   

            var form_data = new FormData();
            form_data.append('modulo', modulo);
            form_data.append('dato', dato);

            var pathname = window.location.pathname;
            var url;

            if(pathname.substring(pathname.length - 4, pathname.length) == "edit"){
                url = '../../../validar/validarDuplicado';
            }else{
                url = '../../validar/validarDuplicado';
            }

            $.ajax({
              url: url,
              headers: {'X-CSRF-TOKEN': $('input[name=_token]').val()},
              type: 'POST',
              datatype:'json',
              contentType: false,
              cache: false,
              processData: false,
              data : form_data
            }).done(function(response){
                //console.log(response);

                $('.duplicado').addClass("has-feedback");

                // Si el dato que se esta ingresando no exixte en la base de datos
                if(response == 0){

                    //Ocultar contenido de validacion de error si hubo una previamente
                    $(".duplicado").removeClass("has-error");
                    $('#inputError1Status').addClass("ocultar");
                    $('#inputError2Status').addClass("ocultar");

                    // Mostrar el contenido indicando que el dato es válido
                    $('.duplicado').addClass("has-success");
                    $("#inputSuccess1Status").removeClass("ocultar");
                    $("#inputSuccess2Status").removeClass("ocultar");
                    $(".boton_duplicado").attr("disabled", false);

                }else{

                    //Ocultar contenido de validacion de error si hubo una previamente
                    $(".duplicado").removeClass("has-success");
                    $('#inputSuccess1Status').addClass("ocultar");
                    $('#inputSuccess2Status').addClass("ocultar");

                    // Mostrar el contenido indicando que el dato es válido
                    $('.duplicado').addClass("has-error");
                    $("#inputError1Status").removeClass("ocultar");
                    $("#inputError2Status").removeClass("ocultar");  
                    // Deshabilitar el boton si existe el dato en base de datos
                    $(".boton_duplicado").attr("disabled", true);

                }

            });
        }

    });


});