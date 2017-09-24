$(document).ready(function() {

	///// Caregar dependencia inpunts

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

	/// Validar cambios en inputs
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

	$( "#estado" ).change(function(){
		if($("#estado").val() != ""){
			$("#requeridoEstadoFormacion").addClass( "ocultar" );
			if($("#estado").val() == "Culminado"){
				document.getElementById("fechaFin").removeAttribute("readonly");
				document.getElementById("fechaFin").setAttribute("required","required");
			}
			else{
				document.getElementById("fechaFin").setAttribute("readonly","readonly");
				$("#requeridoFechaFinFormacion").addClass( "ocultar" );
				$("#fechaFin").val('')			
			}
		}
	});

	$( "#fechaInicio" ).change(function(){
		if($("#fechaInicio").val() != ""){
			$("#requeridoFechaIniFormacion").addClass( "ocultar" );


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

		//////////////////////////////////////////////////////////////////////

		}

	});

	$( "#fechaFin" ).change(function(){
		if($("#fechaFin").val() != ""){
			$("#requeridoFechaFinFormacion").addClass( "ocultar" );
		}
	});

	$( "#ciudadNacimiento" ).change(function(){
		if($("#ciudadNacimiento").val() != ""){
			$("#requeridoCiudadFormacion").addClass( "ocultar" );
		}
	});
	/////////////////////////////////////////

    /// Validaciones y creacion de contrato

    $('#botonEditarTop').on( 'click', function () {
    	crearFormacion();
    } );

    $('#botonEditarBottom').on( 'click', function () {
    	crearFormacion();
    } );

    ///// Crear contrato

	function validarFormacion(){  /// Funcion asincrona

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

	function crearFormacion(val){

	if ($("#tipoIdentificacion").val() == "" || $("#tipoEstudio").val() == "" || $("#intExt").val() == "" || $("#nivelEstudio_id").val() == "" || $("#areaEstudio_id").val() == "" || $("#titulacion").val() == "" || $("#institucionEducativa").val() == "" || $("#estado").val() == "" || $("#fechaInicio").val() == "" || ($("#fechaFin").val() == "" && $("#estado").val() == 'Culminado') || $("#ciudadNacimiento").val() == ""){

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

    	if($("#estado").val() == ""){
    		$("#requeridoEstadoFormacion").removeClass( "ocultar" );
    	}

    	if($("#fechaInicio").val() == ""){
    		$("#requeridoFechaIniFormacion").removeClass( "ocultar" );
    	}

    	if($("#fechaFin").val() == "" && $("#estado").val() == 'Culminado'){
    		document.getElementById("fechaFin").setAttribute("required","required");
    		$("#requeridoFechaFinFormacion").removeClass( "ocultar" );
    	}

    	if($("#ciudadNacimiento").val() == ""){
    		$("#requeridoCiudadFormacion").removeClass( "ocultar" );
    	}

    }else{

	  	var pathname = window.location.pathname;
	  	var url;
	  	var data;

	  	var data = "tipoIdentificacion="+$("#tipoIdentificacion").val()+"&identificacion="+$("#identificacion").val()+"&tipoEstudio="+$("#tipoEstudio").val()+"&intExt="+$("#intExt").val()+"&nivelEstudio_id="+$("#nivelEstudio_id").val()+"&areaEstudio_id="+$("#areaEstudio_id").val()+"&titulacion="+$("#titulacion").val()+"&institucionEducativa="+$("#institucionEducativa").val()+"&estado="+$("#estado").val()+"&fechaInicio="+$("#fechaInicio").val()+"&fechaFin="+$("#fechaFin").val()+"&ciudadNacimiento="+$("#ciudadNacimiento").val();

	  	if(pathname.substring(pathname.length - 4, pathname.length) == "edit"){
	  		url = '../../../administracion/formaciones/crearFormacionAjax';
	  	}else{
	  		url = '../../administracion/formaciones/crearFormacionAjax';
	  	}

		$.ajax({
		  url: url,
		  headers: {'X-CSRF-TOKEN': $('input[name=_token]').val()},
		  type: 'POST',
		  data: data
		}).done(function(response){

			var pathname = window.location.pathname;
			pathname = pathname.substring(0, pathname.length - 7)
			console.log(pathname);
			$.confirm({
			    title: 'Formación almacenda',
			    content: 'Se guardó la formación exitosamente ¿Desea agregar otra formación?',
			    buttons: {
			        confirm: function () {
			            $("#tipoEstudio").val('');
			            $("#intExt").val('');
			            document.getElementById("intExt").setAttribute("disabled","disabled");
			            $("#nivelEstudio_id").val('');
			            document.getElementById("nivelEstudio_id").setAttribute("disabled","disabled");
			            $("#areaEstudio_id").val('');
			            $("#titulacion").val('');
			            $("#institucionEducativa").val('');
			            $("#estado").val('');
			            $("#fechaInicio").val('');
			            document.getElementById("fechaFin").setAttribute("readonly","readonly");
			            $("#fechaFin").val('');
			            $("#ciudadNacimiento").val('');
			        },
			        cancel: function () {
			            window.location.replace(pathname);
			        }
			    }
			});
      
		});
    }

	}

	//////////////////////////////////////////////////////////////////////////////////////////

});