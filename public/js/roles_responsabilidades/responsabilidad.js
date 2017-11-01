$(document).ready(function() {

	$('#addResponsabilidad').on( 'click', function () {

		if ($('#responsabilidad').val() == '') {
    		$("#requeridoResponsabilidad").removeClass( "ocultar" );
		} else {
			$("#requeridoResponsabilidad").addClass("ocultar");
			
			var responsabilidad = $('#responsabilidad').val();
			var tmp = $('#tmp').val();

        	var form_data = new FormData();
        	form_data.append('responsabilidad', responsabilidad);
        	form_data.append('tmp', tmp);

	        $.ajax({
	          url: '../../matrices/roles/createResponsabilidadAjax',
	          headers: {'X-CSRF-TOKEN': $('input[name=_token]').val()},
	          type: 'POST',
	          datatype:'json',
	          contentType: false,
	          cache: false,
	          processData: false,
	          data : form_data
	        }).done(function(response){
	            console.log(response);

	            // t.row.add( [
	            //     response[0].tipoVacaciones+'<span style="opacity:0">-'+response[0].id+'</span>',
	            //     response[0].fechaFin,
	            //     response[0].fechaFin,
	            //     '<a title="Adjunto" href="'+response[0].adjunto+'" target="_blank"><i class="fa fa-file" aria-hidden="true"></i> Archivo adjunto</a>',
	            //     '<a title="Detalles" class="btn btn-default btn-xs buttonDetailAusentismo"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp;<a title="Eliminar" class="btn btn-danger btn-xs buttonDestroyAusentismo"><i class="fa fa-trash-o" aria-hidden="true"></i></a>'
	            // ] ).draw( false );

	            // $("#tipoVacacion").val("");
	            // $("#fechaInicioAusentismo").val("");
	            // $("#fechaFinAusentismo").val("");
	            // $("#adjuntoAusentismo").val("");
	            // $("#detallesAusentismo").val("");
	            // $('#modalAusentismo').modal('toggle');
	        });

		}
	});

});