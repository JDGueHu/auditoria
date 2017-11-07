$( document ).ready(function() {

	$(".confirm_M").confirm({
	    title: 'Eliminar',
	    content: 'Va a eliminar uno de los' + ' ' + $("#modulo").text() + ' ¿Desea continuar?',
        confirmButton: "Continuar",
		cancelButton: "Cancelar",
	});

	$(".confirm_F").confirm({
	    title: 'Eliminar',
	    content: 'Va a eliminar una de las' + ' ' + $("#modulo").text() + ' ¿Desea continuar?',
        confirmButton: "Continuar",
		cancelButton: "Cancelar",
	});

} );