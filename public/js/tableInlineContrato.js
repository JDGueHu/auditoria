
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

     //// Mostrar botones hacer click en nuevo 
     $('#nuevo').on( 'click', function () {
    	$(".addRow").removeClass("ocultar");
    	$(".editRow").addClass("ocultar");
    	//alert("entro");
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

	// Eliminar items en tabla		 
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

				$('#exampleModalLong').modal('show');	
	        	$("#tipoContrato").val(response[0].idTipo);
	        	$("#fechaInicio").val(response[0].fechaInicio);
	        	$("#fechaFin").val(response[0].fechaFin);
	        	$("#duracion").val(response[0].duracion);
	        	$("#estadContrato").val(response[0].estado);
	        	$("#detalles").val(response[0].detalles);

			});
    } );

    $.fn.crearContratoAjax = function() {
		
	   	var data = "tipoContrato="+$("#tipoContrato").val()+"&fechaInicio="+$("#fechaInicio").val()+"&fechaFin="+$("#fechaFin").val()+"&duracion="+$("#duracion").val()+"&detalles="+$("#detalles").val()+"&empleado_id="+$("#empleado_id").val()+"&estadContrato="+$("#estadContrato").val()+"&adjuntoContrato="+$("#adjuntoContrato").val();
		var url = '../../administracion/contratos/createAjax';

		$.ajax({
		  url: url,
		  headers: {'X-CSRF-TOKEN': $('input[name=_token]').val()},
		  type: 'POST',
		  datatype:'json',
		  data : data
		}).done(function(response){
			console.log(response);
        	t.row.add( [
	            response[0].tipoContrato,
	            response[0].estado+'<span style="opacity:0">-'+response[0].id+'</span>',
	            response[0].fechaInicio,
	            response[0].fechaFin,
	            "55",
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
