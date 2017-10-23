
$(document).ready(function() {

	var t = $('#example').DataTable({

    language: {
        lengthMenu: "Mostrar _MENU_ registros por página",
        zeroRecords: "No hay registros para mostrar",
        info: "Mostrando página _PAGE_ de _PAGES_ con _MAX_ registros",
        infoEmpty: "No hay registros disponibles",
        infoFiltered: "(Filtrado de _MAX_ registros totales)",
        sSearch: "Buscar",
        paginate: {
        first:      "Primera",
        previous:   "Anterior",
        next:       "Siguiente",
        last:       "Última"
    	}
    },
    pageLength: 5,


	});

     //// Eventos al hacer click en click en nuevo 
     $('#nuevo').on( 'click', function () {
    	$(".addRow").removeClass("ocultar");
    	$(".editRow").addClass("ocultar");
    	$(".ocultarShowContrato").removeClass("ocultar");

    	$("#tipoContrato").val("");
    	$("#fechaInicio").val("");
    	$("#fechaFin").val("");
    	$("#duracion").val("");
    	$("#estadContrato ").val('Activo');
    	$("#detalles").val("");

		$("#tipoContrato").prop( "disabled", false );
		$("#estadContrato").prop( "disabled", false );
		$("#detalles").prop( "disabled", false );

    } );

    /// Validaciones y creacion de contrato
    $('.addRow').on( 'click', function () {
    	validarTipoContratoCrear(1);
    } );

	//////////// Eliminación de contrato

    $('#example tbody').on( 'click', '.buttonDestroy', function () {

		var validate = confirm('Va a eliminar un contrato ¿Desea continuar?');

		if (validate == true) {
	        if ( $(this).parents('tr').hasClass('eliminar') ) {
	    		$(this).parents('tr').removeClass('eliminar');
			}
			else {
	            t.$('tr.eliminar').removeClass('eliminar');
	            $(this).parents('tr').addClass('eliminar');
			}	

	    	var  cadena = $(this).parents('tr').children().eq(1).text();
	    	var array = cadena.split("-");

			$.ajax({
				  url: '../../administracion/contratos/'+array[1]+'/destroyAjax',
				  type: 'GET'
				}).done(function(response){
					//console.log(response);
				  t.row('.eliminar').remove().draw( false );
				});
		}

    });

	//////////// Detalle de contrato

    $('#example tbody').on( 'click', '.buttonDetail', function () {

    	var  cadena = $(this).parents('tr').children().eq(1).text();
    	var array = cadena.split("-");

		$.ajax({
			  url: '../../administracion/contratos/'+array[1]+'/showAjax',
			  type: 'GET'
			}).done(function(response){

				$(".addRow").addClass("ocultar");
				$(".editRow").addClass("ocultar");
				$("#tipoContrato").prop( "disabled", true );
				$("#estadContrato").prop( "disabled", true );
				$("#detalles").prop( "disabled", true );
		    	$("#requeridoTipoContrato").addClass( "ocultar" );
		    	$("#requeridoFechaIniContrato").addClass( "ocultar" );
		    	$("#requeridoDuracionContrato").addClass( "ocultar" );
		    	$("#requeridoEstadoContrato").addClass( "ocultar" );
		    	$("#adjuntoContrato").addClass("ocultar");
		    	$(".ocultarShowContrato").addClass("ocultar");

				$('#exampleModalLong').modal('show');	
	        	$("#tipoContrato").val(response[0].idTipo);
	        	$("#fechaInicio").val(response[0].fechaInicio);
	        	$("#fechaFin").val(response[0].fechaFin);
	        	$("#duracion").val(response[0].duracion);
	        	$("#estadContrato").val(response[0].estado);
	        	$("#detalles").val(response[0].detalles);

			});
    } );

    //////////// Creación de contrato

    $.fn.crearContratoAjax = function() {
		
	   	//var data = "tipoContrato="+$("#tipoContrato").val()+"&fechaInicio="+$("#fechaInicio").val()+"&fechaFin="+$("#fechaFin").val()+"&duracion="+$("#duracion").val()+"&detalles="+$("#detalles").val()+"&empleado_id="+$("#empleado_id").val()+"&estadContrato="+$("#estadContrato").val()+"&adjuntoContrato="+$('#adjuntoContrato').prop('files')[0];
			
		var identificacion = $('#identificacion').val();
	   	var tipoContrato = $('#tipoContrato').val();
	   	var fechaInicio = $('#fechaInicio').val();  
	   	var duracion = $('#duracion').val();	   	
	   	var fechaFin = $('#fechaFin').val(); 
	   	var estado = $('#estadContrato').val(); 	   	 
	   	var adjunto = $('#adjuntoContrato').prop('files')[0];
	   	var detalles = $('#detalles').val();

        var form_data = new FormData();
        form_data.append('identificacion', identificacion);
        form_data.append('tipoContrato', tipoContrato);
        form_data.append('fechaInicio', fechaInicio);
        form_data.append('duracion', duracion);
        form_data.append('fechaFin', fechaFin);
        form_data.append('estado', estado);
        form_data.append('adjunto', adjunto);
        form_data.append('detalles', detalles);

		var url = '../../administracion/contratos/createAjax';

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
			
        	t.row.add( [
	            response[0].tipoContrato,
	            response[0].estado+'<span style="opacity:0">-'+response[0].id+'</span>',
	            response[0].fechaInicio,
	            response[0].fechaFin,
	            '<a title="Adjunto" href="'+response[0].adjunto+'" target="_blank"><i class="fa fa-file" aria-hidden="true"></i> Archivo adjunto</a>',
	            '<a title="Detalles" class="btn btn-default btn-xs buttonDetail"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp;<a title="Eliminar" class="btn btn-danger btn-xs buttonDestroy"><i class="fa fa-trash-o" aria-hidden="true"></i></a>'
            ] ).draw( false );

        	$("#tipoContrato").val("");
        	$("#fechaInicio").val("");
        	$("#fechaFin").val("");
        	$("#duracion").val("");
        	$("#estadContrato ").val("");
        	$("#detalles").val("");
        	$('#exampleModalLong').modal('toggle');
		});
	};

});
