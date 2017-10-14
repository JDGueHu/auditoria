$(document).ready(function() {

	///// Cargar dependencia inpunts

	$( "#tipoEstudio" ).change(function(){

		if($("#tipoEstudio").val() != ""){
			$("#requeridoTipoFormacion").addClass( "ocultar" );
			document.getElementById("intExt").removeAttribute("disabled");
			document.getElementById("nivelEstudio_id").removeAttribute("disabled");
			validarFormacion();
		}else{
			document.getElementById("intExt").setAttribute("disabled","disabled");
			document.getElementById("nivelEstudio_id").setAttribute("disabled","disabled");
			$("#intExt").val('');
			$("#nivelEstudio_id").val('');
		}

	});

	/////////////////////////////////////////

	/// Quitar mensajes de campos requeridos cuando están diligenciados
	$( "#tipoEstudio" ).change(function(){
    	if($("#tipoEstudio").val() != ""){
    		$("#requeridoTipoFormacion").addClass( "ocultar" );
    	}
	});

	$( "#intExt" ).change(function(){
		if($("#intExt").val() != ""){
			$("#requeridoCategoriaFormacion").addClass( "ocultar" );
		}
	});

	$( "#nivelEstudio_id" ).change(function(){
		if($("#nivelEstudio_id").val() != ""){
			$("#requeridoNivelEstudio").addClass( "ocultar" );
		}
	});

	$( "#areaEstudio_id" ).change(function(){
		if($("#areaEstudio_id").val() != ""){
			$("#requeridoAreaFormacion").addClass( "ocultar" );
		}
	});

	$( "#titulacion" ).change(function(){
		if($("#titulacion").val() != ""){
			$("#requeridoTitulacionFormacion").addClass( "ocultar" );
		}
	});

	$( "#institucionEducativa" ).change(function(){
		if($("#institucionEducativa").val() != ""){
			$("#requeridoInstitucionEducativaFormacion").addClass( "ocultar" );
		}
	});

	$( "#estadoFormacion" ).change(function(){
		
		if($("#estadoFormacion").val() != ""){
			$("#requeridoEstadoFormacion").addClass( "ocultar" );
			if($("#estadoFormacion").val() != "Culminado" ){
				document.getElementById("fechaFinFormacion").setAttribute("readonly","readonly");
				document.getElementById("fechaFinFormacion").removeAttribute("required");
				$("#requeridoFechaFinFormacion").addClass( "ocultar" );
				$("#fechaFinFormacion").val('')		
			}else{
				if ($("#estadoFormacion").val() == "Culminado" && $("#fechaInicioFormacion").val() != "") {
					document.getElementById("fechaFinFormacion").removeAttribute("readonly");
					document.getElementById("fechaFinFormacion").setAttribute("required","required");
				}
			}
		}else{			
			document.getElementById("fechaFinFormacion").setAttribute("readonly","readonly");
			document.getElementById("fechaFinFormacion").removeAttribute("required");
			$("#requeridoFechaFinFormacion").addClass( "ocultar" );
			$("#requeridoFechaIniFormacion").addClass( "ocultar" );	
			$("#fechaInicioFormacion").val('')
			$("#fechaFinFormacion").val('')	
		}

	});

	$( "#fechaInicioFormacion" ).change(function(){
		if($("#fechaInicioFormacion").val() != ""){
			$("#requeridoFechaIniFormacion").addClass( "ocultar" );		
		}

		if($("#estadoFormacion").val() == "Culminado"){			
			document.getElementById("fechaFinFormacion").removeAttribute("readonly");
			document.getElementById("fechaFinFormacion").setAttribute("required","required");
		}
		else{
			document.getElementById("fechaFinFormacion").setAttribute("readonly","readonly");
			document.getElementById("fechaFinFormacion").removeAttribute("required");
			$("#requeridoFechaFinFormacion").addClass( "ocultar" );
			$("#fechaFinFormacion").val('')	
		}

		//// Restringir la seleccion de fecha para la fecha de finalizacion ////
		var fecha = new Date($("#fechaInicioFormacion").val());
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
		document.getElementById("fechaFinFormacion").setAttribute("min", fecha);

	});


	$( "#ciudadNacimientoFormacion" ).change(function(){
		if($("#ciudadNacimientoFormacion").val() != ""){
			$("#requeridoCiudadFormacion").addClass( "ocultar" );
		}
	});
	/////////////////////////////////////////

    /// Validaciones y creacion de contrato
    $('.botonCrearFormacion').on( 'click', function () {
    	validarFormacionAjax(0);
    } );

    $('.botonEditarFormacion').on( 'click', function () {
    	validarFormacionAjax(2);
    } );
    
	/// Funcion para validar niveles de estudio con base en la tipo
	function validarFormacion(){  

	  	var pathname = window.location.pathname;
	  	var url;

	  	if(pathname.substring(pathname.length - 4, pathname.length) == "edit"){
	  		url = '../../../administracion/formaciones/'+$("#tipoEstudio").val()+'/nivelFormacionAjax';
	  	}else{
	  		url = '../../administracion/formaciones/'+$("#tipoEstudio").val()+'/nivelFormacionAjax';
	  	}

		$.ajax({
		  url: url,
		  headers: {'X-CSRF-TOKEN': $('input[name=_token]').val()},
		  type: 'GET',
		}).done(function(response){
			//console.log(response);
			response.forEach(function(element){
				if (element.tipoEstudio == $("#tipoEstudio").val()){
					$("#nivelEstudio_id").children('option[value="' + element.id + '"]').show();
				}else{
					$("#nivelEstudio_id").children('option[value="' + element.id + '"]').hide();
				}
			});				
		});
	}

});

///// Validar antes de crear formacion
function validarFormacionAjax(tipoCreacion){

	if ($("#tipoIdentificacion").val() == "" || $("#tipoEstudio").val() == "" || $("#intExt").val() == "" || $("#nivelEstudio_id").val() == "" || $("#areaEstudio_id").val() == "" || $("#titulacion").val() == "" || $("#institucionEducativa").val() == "" || $("#estadoFormacion").val() == "" || $("#fechaInicioFormacion").val() == "" || ($("#fechaFinFormacion").val() == "" && $("#estado").val() == 'Culminado') || $("#ciudadNacimientoFormacion").val() == ""){

        if($("#tipoIdentificacion").val() == ""){
            $("#requeridoTipoIdentificacionEmpleado").removeClass( "ocultar" );
            $("#requeridoIdentificacionEmpleado").removeClass( "ocultar" );
        }

        if($("#tipoEstudio").val() == ""){
            $("#requeridoTipoFormacion").removeClass( "ocultar" );
        }

        if($("#intExt").val() == ""){
            $("#requeridoCategoriaFormacion").removeClass( "ocultar" );
        }

        if($("#nivelEstudio_id").val() == ""){
            $("#requeridoNivelEstudio").removeClass( "ocultar" );
        }

        if($("#areaEstudio_id").val() == ""){
            $("#requeridoAreaFormacion").removeClass( "ocultar" );
        }

        if($("#titulacion").val() == ""){
            $("#requeridoTitulacionFormacion").removeClass( "ocultar" );
        }

        if($("#institucionEducativa").val() == ""){
            $("#requeridoInstitucionEducativaFormacion").removeClass( "ocultar" );
        }

        if($("#estadoFormacion").val() == ""){
            $("#requeridoEstadoFormacion").removeClass( "ocultar" );
        }

        if($("#fechaInicioFormacion").val() == ""){
            $("#requeridoFechaIniFormacion").removeClass( "ocultar" );
        }

        if($("#fechaFinFormacion").val() == "" && $("#estado").val() == 'Culminado'){
            document.getElementById("fechaFin").setAttribute("required","required");
            $("#requeridoFechaFinFormacion").removeClass( "ocultar" );
        }

        if($("#ciudadNacimientoFormacion").val() == ""){
            $("#requeridoCiudadFormacion").removeClass( "ocultar" );
        }

    }else{
    	$.fn.crearFormacionAjax(tipoCreacion);
    }

}


/////  Google place autocompletar  /////

var autocomplete2;
var componentForm = {
locality: 'long_name',
administrative_area_level_1: 'short_name',
country: 'long_name',
};

function initAutocomplete() {
    // Create the autocomplete object, restricting the search to geographical
    // location types.
    autocomplete2 = new google.maps.places.Autocomplete(
    /** @type {!HTMLInputElement} */(document.getElementById('ciudadNacimientoFormacion')),
    {types: ['geocode']});

    // When the user selects an address from the dropdown, populate the address
    // fields in the form.
    autocomplete2.addListener('place_changed', fillInAddress2);
}

function fillInAddress2() {
    // Get the place details from the autocomplete object.
    var place = autocomplete2.getPlace();

    // Get each component of the address from the place details
    // and fill the corresponding field on the form.
    for (var i = 0; i < place.address_components.length; i++) {
      var addressType = place.address_components[i].types[0];

      if (place.address_components[i].types[0] == 'locality') {          
            document.getElementById('ciudadNacimientoFormacion').value = place.address_components[i].long_name;
        } 
    }
}

// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
        var geolocation = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };
        var circle = new google.maps.Circle({
          center: geolocation,
          radius: position.coords.accuracy
        });
        autocomplete2.setBounds(circle.getBounds());
      });
    }
}