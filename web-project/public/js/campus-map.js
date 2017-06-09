$(function(){
	var schoolId = $('#schoolId').val()
	var map = new GMaps({
		  el: '#campus-map',
		  lat: 51.2154075,
		  lng: 4.409795,
		  zoom: 11
		});

	$.getJSON('/json/campussen/all/'+schoolId ,function(result){
		$.each(result,function(index,value){
			var location = value.coordinaten.split(",");
			console.log(location);

          	map.addMarker({
	            lat: location[0],
	            lng: location[1],
	            title: value.naam,
	            infoWindow: {
	              content : value.naam +': '+ value.adres 
	            }
	        });

		});
	})
	



});
