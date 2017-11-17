$( document ).ready(function() {

	$(".confirm_M").confirm({
	    title: 'Eliminar',
	    content: 'Va a inactivar uno de los' + ' ' + $("#modulo").text() + ' ¿Desea continuar?',
        confirmButton: "Continuar",
		cancelButton: "Cancelar",
	});

	$(".confirm_F").confirm({
	    title: 'Eliminar',
	    content: 'Va a inactivar una de las' + ' ' + $("#modulo").text() + ' ¿Desea continuar?',
        confirmButton: "Continuar",
		cancelButton: "Cancelar",
	});

} );