$( document ).ready(function() {

	//// Restringir la seleccion de fecha hasta la fecha actual en Empleados ////
	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth()+1; //January is 0!
	var yyyy = today.getFullYear();
	 if(dd<10){
	        dd='0'+dd
	    } 
	    if(mm<10){
	        mm='0'+mm
	    } 

	today = yyyy+'-'+mm+'-'+dd;
	document.getElementById("fechaNacimiento").setAttribute("max", today);
	document.getElementById("fechaIngreso").setAttribute("max", today);

	//////////////////////////////////////////////////////////////////////


});


/////  Google place autocompletar  /////

var autocomplete, autocomplete1, autocomplete2;
var componentForm = {
locality: 'long_name',
administrative_area_level_1: 'short_name',
country: 'long_name',
};

function initAutocomplete() {
    // Create the autocomplete object, restricting the search to geographical
    // location types.
    autocomplete = new google.maps.places.Autocomplete(
        /** @type {!HTMLInputElement} */(document.getElementById('ciudadNacimiento')),
        {types: ['geocode']});
    autocomplete1 = new google.maps.places.Autocomplete(
    /** @type {!HTMLInputElement} */(document.getElementById('ciudadDireccion')),
    {types: ['geocode']});

    // When the user selects an address from the dropdown, populate the address
    // fields in the form.
    autocomplete.addListener('place_changed', fillInAddress);
    autocomplete1.addListener('place_changed', fillInAddress1);
}

function fillInAddress() {
    // Get the place details from the autocomplete object.
    var place = autocomplete.getPlace();

    // Get each component of the address from the place details
    // and fill the corresponding field on the form.
    for (var i = 0; i < place.address_components.length; i++) {
      var addressType = place.address_components[i].types[0];

      if (place.address_components[i].types[0] == 'locality') {          
            document.getElementById('ciudadNacimiento').value = place.address_components[i].long_name;
        } else if (place.address_components[i].types[0] == 'administrative_area_level_1') {
            document.getElementById('departamentoNacimiento').value = place.address_components[i].long_name;
        } else if (place.address_components[i].types[0] == 'country') {
            document.getElementById('paisNacimiento').value = place.address_components[i].long_name;
        }

    }
}

function fillInAddress1() {
    // Get the place details from the autocomplete object.
    var place = autocomplete1.getPlace();

    // Get each component of the address from the place details
    // and fill the corresponding field on the form.
    for (var i = 0; i < place.address_components.length; i++) {
      var addressType = place.address_components[i].types[0];

      if (place.address_components[i].types[0] == 'locality') {          
            document.getElementById('ciudadDireccion').value = place.address_components[i].long_name;
        } else if (place.address_components[i].types[0] == 'administrative_area_level_1') {
            document.getElementById('departamentoDireccion').value = place.address_components[i].long_name;
        } else if (place.address_components[i].types[0] == 'country') {
            document.getElementById('paisDireccion').value = place.address_components[i].long_name;
        }

    }
}

// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
        var geolocation = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };
        var circle = new google.maps.Circle({
          center: geolocation,
          radius: position.coords.accuracy
        });
        autocomplete.setBounds(circle.getBounds());
        autocomplete1.setBounds(circle.getBounds());
      });
    }
}