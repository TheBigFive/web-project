var thereIsAMarker = false;
var map = new GMaps({
  el: '#admin-map',
  lat: 51.2154075,
  lng: 4.409795,
  zoom: 12
});

$(document).ready(function() {
	//Summernote textarea plugin
  	$('.summernote').summernote({
	    lang: 'nl-NL',
	    height: 200,
	    toolbar: [
	      // [groupName, [list of button]]
	   		['style', ['bold', 'italic', 'underline', 'clear']],
	    	['font', ['strikethrough', 'superscript', 'subscript']],
	    	['fontsize', ['fontsize']],
	    	['color', ['color']],
	    	['para', ['ul', 'ol', 'paragraph', 'style']],
	    	['height', ['height']],
	    	['insert',['link','codeview','fullscreen']]
	     ],
	    placeholder: 'Schrijf je tekst hier...',
	    focus: true,
    });

    $('.afwijzingForm').hide();
    $('#tagForm').hide();

});


//Tabs gebruikers in het adminpaneel
$('.nav-tabs a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})

//Knop reden van afwijzing in alle openPaginas in admin
$('#afwijzingKnop').click(function () {
	$(this).hide();
	$('.afwijzingForm').slideDown();
})

//Knop reden van afwijzing annuleren in alle openPaginas in admin
$('#afwijzingAnnulerenKnop').click(function () {
	$('.afwijzingForm').slideUp(function() {
   		$('#afwijzingKnop').show();
	});	
	
})

//Knop tag toevoegen in tags admin pagina
$('#tagToevoegenKnop').click(function () {
	$(this).hide();
	$('#tagForm').slideDown();
})

//Knop tag toevoegen annuleren in tags admin pagina
$('#tagAnnulerenKnop').click(function () {
	$('#tagForm').slideUp(function() {
   		$('#tagToevoegenKnop').show();
	});	
	
})

GMaps.on('click', map.map, function(event) {

  if(thereIsAMarker){
    map.removeMarkers();
  }

  var index = map.markers.length;
  var lat = event.latLng.lat();
  var lng = event.latLng.lng();

  var locatie_input = document.getElementById("locatie-input");
  locatie_input.value = lat + "," + lng;

  map.addMarker({
    lat: lat,
    lng: lng,
  });

  thereIsAMarker = true;


});

 $('#locatieKnop').click(function(e){
        e.preventDefault();
	GMaps.geocode({
	  adres: $('#locatie-text').val(),
	  callback: function(results, status) {
	    if (status == 'OK') {
	      var latlng = results[0].geometry.location;
	      map.setCenter(latlng.lat(), latlng.lng());
	      locatie_input.value = latlng.lat() + "," + latlng.lng();
	      if(thereIsAMarker){
		    map.removeMarkers();
		  }
	      map.addMarker({
	        lat: latlng.lat(),
	        lng: latlng.lng()
	      });
	    }
	  }
	});
}
