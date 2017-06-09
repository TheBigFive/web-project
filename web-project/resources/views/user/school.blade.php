@extends('layouts.app')
@section('content')
       <link rel="stylesheet" href="{{ asset('css/school.css') }}" >
	<div class="container row">
		<div class="schoolapartcontainer">
			<div class="kind col-xs-12 col-sm-4 col-md-4 col-lg-4">
				<h1>{{ $geopendeSchool->naam }}</h1>
			</div>

			<div class="kind col-xs-12 col-sm-4 col-md-4 col-lg-4">
				<a href="{{ $geopendeSchool->website }}">
					<svg viewbox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
						<defs>
					    	<pattern id="img1" patternUnits="userSpaceOnUse" width="100" height="100">
					    		@foreach ($alleSchoolMedia as $key => $media)
					    			@if( $media->mediaType == "Afbeelding" )
					    				<image xlink:href="{{ asset(($media->link)) }}" y="-25" x="-25" width="150" height="150" />
					    			@endif
					    		@endforeach
					    	</pattern>
						</defs>
						<polygon points="50 1 100 25 100 75 50 99 0 75 0 25" fill="url(#img1)"/>
					</svg>
				</a>
			</div>
			<div class="kind col-xs-12 col-sm-4 col-md-4 col-lg-4">
				<p>
					{!! $geopendeSchool->beschrijving !!}
				</p>
			</div>
		</div>


		<div class="centerheader row">
			<p>____________________________________________________________________</p>
				<h1>Studiegebieden</h1>
			<p>____________________________________________________________________</p>

				@foreach($alleInteressegebieden as $key => $interessegebied)
					<div class="kolom col-xs-12 col-sm-6 col-md-4 col-lg-4">
						<div class="foto">
						<a href="{{ $interessegebied->link }}">
						<svg viewbox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
							<defs>
						    	<pattern id="img{{ $key }}" patternUnits="userSpaceOnUse" width="100" height="100">
						    		<image xlink:href="{{ asset(($interessegebied->media_link)) }}" y="-25" x="-25" width="150" height="150" />
						    	</pattern>
							</defs>
							<polygon points="50 1 100 25 100 75 50 99 0 75 0 25" fill="url(#img{{ $key }})"/>
						</svg>
						</a>
						</div>
						<h3>{{ $interessegebied->naam }}</h3>
					</div>
				@endforeach	
					
		</div>



		

		<div class="row centerheader">
			<p>____________________________________________________________________</p>
			<h1>Campussen</h1>
			<p>____________________________________________________________________</p>
		</div>



<div class="kaartje">

<script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script>
<div style='overflow:hidden; height:100%; width:100%;'>  <!--heigth:440px; width:700px;-->
	<div id='gmap_canvas' style='height:440px;width:700px;'></div>
	<style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
	</div>

	<script type='text/javascript'>
		function init_map()
		{
			var myOptions = {zoom:15,center:new google.maps.LatLng(51.23014910000001,4.417694900000015),mapTypeId: google.maps.MapTypeId.ROADMAP};

			map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);


			marker = new google.maps.Marker(
			{
				map: map,position: new google.maps.LatLng(51.23014910000001,4.417694900000015)
			});

			marker2 = new google.maps.Marker(
			{
				map: map,position: new google.maps.LatLng(51.2161252,4.410527199999933)
			});

			marker3 = new google.maps.Marker(
			{
				map: map,position: new google.maps.LatLng(51.2121279,4.399658799999997)
			});
			
			marker4 = new google.maps.Marker(
			{
				map: map,position: new google.maps.LatLng(51.1940446,4.403726600000027)
			});
			
			marker5 = new google.maps.Marker(
			{
				map: map,position: new google.maps.LatLng(51.2232238,4.406189400000017)
			});


			infowindow = new google.maps.InfoWindow(
			{
				content:'<strong>Campus Spoor Noord</strong><br>Ellermansstraat 33, Antwerpen<br>'
			});

			infowindow2 = new google.maps.InfoWindow(
			{
				content:'<strong>Campus Meistraat</strong><br>Meistraat 5, Antwerpen<br>'
			});
			
			infowindow3 = new google.maps.InfoWindow(
			{
				content:'<strong>Campus Kronenburg</strong><br>Kronenburgstraat 47, Antwerpen<br>'
			});

			infowindow4 = new google.maps.InfoWindow(
			{
				content:'<strong>Campus deSingel</strong><br>Desguinlei 25, Antwerpen<br>'
			});

			infowindow5 = new google.maps.InfoWindow(
			{
				content:'<strong>Koninklijke Academie voor Schone Kunsten</strong><br>Mutsaardstraat 31, Antwerpen<br>'
			});


			google.maps.event.addListener(marker, 'click', function()
			{
				infowindow.open(map,marker);
			});

			google.maps.event.addListener(marker2, 'click', function()
			{
				infowindow2.open(map,marker2);
			});

			google.maps.event.addListener(marker3, 'click', function()
			{
				infowindow2.open(map,marker3);
			});

			google.maps.event.addListener(marker4, 'click', function()
			{
				infowindow2.open(map,marker4);
			});

			google.maps.event.addListener(marker5, 'click', function()
			{
				infowindow2.open(map,marker5);
			});


			infowindow.open(map,marker);
			infowindow2.open(map,marker2);
			infowindow3.open(map,marker3);
			infowindow4.open(map,marker4);
			infowindow5.open(map,marker5);
		}

		google.maps.event.addDomListener(window, 'load', init_map);
	</script>

</div>


</div>
@endsection