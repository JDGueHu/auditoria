$(document).ready(function() {
    var t = $('#restricciones').DataTable({

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
        columns: [
            { "width": "80%" },
            { "width": "20%" }
        ]
    });

    $( "#restriccion" ).change(function(){
        $("#requeridoRestriccion").addClass( "ocultar" );
    });

    $('#addRow').on( 'click', function () {

        if($('#restriccion').val() == ''){
            $("#requeridoRestriccion").removeClass( "ocultar" );
        }
        else{

            $("#requeridoRestriccion").addClass( "ocultar" );

            var pathname = window.location.pathname;
            var url;

            if(pathname.substring(pathname.length - 4, pathname.length) == "edit"){
                url = '../../../administracion/restriccionesMedicas/createAjax';
            }else{
                url = '../../administracion/restriccionesMedicas/createAjax';
            }

            var data = "restriccion="+$("#restriccion").val()+"&tmp="+$("#tmp").val() ;


            $.ajax({
              url: url,
              headers: {'X-CSRF-TOKEN': $('input[name=_token]').val()},
              type: 'POST',
              data: data
            }).done(function(response){
                $("#restriccion").val('');
                //console.log(response);  
                t.row.add( [
                response.restriccion+'<span style="opacity:0">z$&'+response.id+'</span>',
                '<a title="Eliminar" class="btn btn-danger btn-xs buttonDestroy"><i class="fa fa-trash-o" aria-hidden="true"></i></a>'
            ] ).draw( false );            
            });
        }
    });



    // Eliminar items en tabla
         
    $('#restricciones tbody').on( 'click', '.buttonDestroy', function () {

        var  cadena = $(this).parents('tr').children().eq(0).text();
        var array = cadena.split("z$&");

        if ( $(this).parents('tr').hasClass('eliminar') ) {
            $(this).parents('tr').removeClass('eliminar');
        }
        else {
            t.$('tr.eliminar').removeClass('eliminar');
            $(this).parents('tr').addClass('eliminar');
        }   

        $.confirm({
            title: 'Eliminar',
            content: 'Va a eliminar una restricción ¿Desea continuar?',
            buttons: {
                ok: function () {

                    var pathname = window.location.pathname;
                    var url;

                    if(pathname.substring(pathname.length - 4, pathname.length) == "edit"){
                        url = '../../../administracion/restriccionesMedicas/'+array[1]+'/destroyAjax';
                    }else{
                        url = '../../administracion/restriccionesMedicas/'+array[1]+'/destroyAjax';
                    }

                    $.ajax({
                      url: url,
                      type: 'GET'
                    }).done(function(response){
                      //console.log(response);
                      t.row('.eliminar').remove().draw( false );
                    });
                },
                cancel: function () {}
            }
        });

    });
});

