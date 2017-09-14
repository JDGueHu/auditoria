$(document).ready(function() {
    var t = $('#example').DataTable();
    var counter = 1;
 
    $('#addRow').on( 'click', function () {
        t.row.add( [
            $('#tipoContrato').val(),
            $('#fechaInicio').val(),
            $('#duracion').val(),
            $('#fechaFin').val(),
            '<a title="Eliminar" href="#" class="btn btn-danger btn-xs confirm_M"><i class="fa fa-trash-o" aria-hidden="true"></i></a>'
              ] ).draw( false );
 
    } );

        $('#example tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            t.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );
 
} );