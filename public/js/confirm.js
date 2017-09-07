$( document ).ready(function() {

	$(".confirm_M").confirm({
	    title: 'Eliminar',
	    content: 'Va a eliminar uno de los' + ' ' + $("#modulo").text() + ' ¿Desea continuar?',
        confirmButton: "Continuar",
		cancelButton: "Cancelar",
	});
} );