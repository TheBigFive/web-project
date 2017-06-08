$(function(){
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

  	if($('.gebruikerswrapper').hasClass('bevatNieuweBezienswaardigheidMap')){
	    var thereIsAMarker = false;
		var map = new GMaps({
		  el: '#voegBezienswaardigheidToe-map',
		  lat: 51.2154075,
		  lng: 4.409795,
		  zoom: 12
		});


		$('#locatieBezienswaardigheidKnop').click(function(e){
			if(thereIsAMarker){
			    map.removeMarkers();
			}
		    e.preventDefault();
			GMaps.geocode({
			  address: $('#locatie-text').val(),
			  callback: function(results, status) {
			    if (status == 'OK') {
			      var latlng = results[0].geometry.location;
			      map.setCenter(latlng.lat(), latlng.lng());
			      var locatie_input = document.getElementById("locatie-input");
			      locatie_input.value = latlng.lat() + "," + latlng.lng();	      
			      map.addMarker({
			        lat: latlng.lat(),
			        lng: latlng.lng(),
			        title: $('#locatie-text').val(),
			        infoWindow: {
					  content: $('#locatie-text').val()
					}
			      });
			    }
			  }
			});
		});

  	}

  	if($('.gebruikerswrapper').hasClass('bevatOpenBezienswaardigheidMap')){

  		var locatie = coordinaten.value.split(",");
  		var map = new GMaps({
			el: '#openBezienswaardigheid-map',
			lat: locatie[0],
			lng: locatie[1],
		});

		map.addMarker({
		  lat: locatie[0],
			lng: locatie[1],
			title: $('#adres').val(),
			infoWindow: {
				content: $('#adres').val()
			}
		});
  	}

  	if($('.gebruikerswrapper').hasClass('bevatWijzigBezienswaardigheidMap')){

  		var thereIsAMarker = true;

  		var locatie = $('#locatie-input').attr('value').split(",");
  		var map = new GMaps({
			el: '#wijzigBezienswaardigheid-map',
			lat: locatie[0],
			lng: locatie[1],
		});

		map.addMarker({
		  lat: locatie[0],
			lng: locatie[1],
			title: $('#adres').val(),
			infoWindow: {
				content: $('#adres').val()
			}
		});

		$('#locatieBezienswaardigheidKnop').click(function(e){
			if(thereIsAMarker){
			    map.removeMarkers();
			}
		    e.preventDefault();
			GMaps.geocode({
			  address: $('#locatie-text').val(),
			  callback: function(results, status) {
			    if (status == 'OK') {
			      var latlng = results[0].geometry.location;
			      map.setCenter(latlng.lat(), latlng.lng());
			      var locatie_input = document.getElementById("locatie-input");
			      locatie_input.value = latlng.lat() + "," + latlng.lng();	      
			      map.addMarker({
			        lat: latlng.lat(),
			        lng: latlng.lng(),
			        title: $('#locatie-text').val(),
			        infoWindow: {
					  content: $('#locatie-text').val()
					}
			      });
			    }
			  }
			});
		});

  	}
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

