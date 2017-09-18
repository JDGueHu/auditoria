
/////  Google place autocompletar  /////

var autocomplete, autocomplete1;
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

///////////////////////////////////////////////////////////////////////

///////////////////////////////// Saber los dias de un mes

function diasMes(mm,yyyy){

    var dias;

    switch(mm) {
        case 0:
            dias = 31;
            break;
        case 1:
            dias = 28;
            break;
        case 2:
            dias = 31
            break;
        case 3:
            dias = 30;
            break;
        case 4:
            dias = 31;
            break;
        case 5:
            dias = 30;
            break;   
        case 6:
            dias = 31;
            break;  
        case 7:
            dias = 31;
            break;  
        case 8:
            dias = 30;
            break;  
        case 9:
            dias = 31;
            break;  
        case 10:
            dias = 30;
            break;  
        case 11:
            dias = 31;
            break;
    }

    if ((((yyyy%100)!=0)&&((yyyy%4)==0))||((yyyy%400)==0)){
      dias = dias + 1;
     }

    return dias;
}

///////////////////////////////////////////////////////////////////////