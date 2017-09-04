$( document ).ready(function() {

	$(".confirm_M").confirm({
	    title: 'Eliminar',
	    content: 'Va a eliminar un' + ' ' + $("#modulo").text() + ' ¿Desea continuar?',
        confirmButton: "Continuar",
		cancelButton: "Cancelar",
	});
} );