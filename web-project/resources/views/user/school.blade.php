@extends('layouts.app')
@section('content')
	<div class="container">

		<div class="schoolapartcontainer cfx">

			<h1>AP-Hogeschool</h1>

			<div class="fotoschoolapart">
				<a href="https://www.ap.be/">
					<svg viewbox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
						<defs>
					    	<pattern id="img1" patternUnits="userSpaceOnUse" width="100" height="100">
					    		<image xlink:href="img/school1.jpg" y="-25" x="-25" width="150" height="150" />
					    	</pattern>
						</defs>
						<polygon points="50 1 100 25 100 75 50 99 0 75 0 25" fill="url(#img1)"/>
					</svg>
				</a>
			</div>
			<div class="paragraffotoapart">
				<p>
					AP is een hogeschool met zo’n 12.000 studenten, 19 HBO5-opleidingen, 24 professionele bachelor- en 8 artistieke opleidingen, verdeeld over 4 departementen en 2 schools of arts. Ook al is de fusiehogeschool nieuw, toch hebben we al een lange geschiedenis, denk maar aan de Koninklijke Academie voor Schone Kunsten en het Koninklijk Conservatorium Antwerpen. 
				</p>
			</div>
		</div>


		<div class="centerheader">
			<p>____________________________________________________________________</p>
				<h1>Studiegebieden</h1>
			<p>____________________________________________________________________</p>

				<div class="kolom col-xs-12 col-sm-6 col-md-4 col-lg-4">
					<div class="foto">
					<a href="{{ url('school') }}">
					<svg viewbox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
						<defs>
					    	<pattern id="img2" patternUnits="userSpaceOnUse" width="100" height="100">
					    		<image xlink:href="img/studiegebied1.jpg" y="-25" x="-25" width="150" height="150" />
					    	</pattern>
						</defs>
						<polygon points="50 1 100 25 100 75 50 99 0 75 0 25" fill="url(#img2)"/>
					</svg>
					</a>
					</div>
					<h3>Gezondheid en Welzijn</h3>
				</div>

				<div class="kolom col-xs-12 col-sm-6 col-md-4 col-lg-4">
					<div class="foto">
					<a href="{{ url('school') }}">
					<svg viewbox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
						<defs>
					    	<pattern id="img3" patternUnits="userSpaceOnUse" width="100" height="100">
					    		<image xlink:href="img/studiegebied2.jpg" y="-25" x="-25" width="150" height="150" />
					    	</pattern>
						</defs>
						<polygon points="50 1 100 25 100 75 50 99 0 75 0 25" fill="url(#img3)"/>
					</svg>
					</a>
					</div>
					<h3>Management en communicatie</h3>
				</div>

				<div class="kolom col-xs-12 col-sm-6 col-md-4 col-lg-4">
					<div class="foto">
					<a href="{{ url('school') }}">
					<svg viewbox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
						<defs>
					    	<pattern id="img4" patternUnits="userSpaceOnUse" width="100" height="100">
					    		<image xlink:href="img/studiegebied3.jpg" y="-25" x="-25" width="150" height="150" />
					    	</pattern>
						</defs>
						<polygon points="50 1 100 25 100 75 50 99 0 75 0 25" fill="url(#img4)"/>
					</svg>
					</a>
					</div>
					<h3>Onderwijs en training</h3>
				</div>

				<div class="kolom col-xs-12 col-sm-6 col-md-4 col-lg-4" style="margin-top: 1.6%; margin-left: 16%; margin-bottom: 3.155%;">
					<div class="foto">
					<a href="{{ url('school') }}">
					<svg viewbox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
						<defs>
					    	<pattern id="img5" patternUnits="userSpaceOnUse" width="100" height="100">
					    		<image xlink:href="img/studiegebied4.jpg" y="-25" x="-25" width="150" height="150" />
					    	</pattern>
						</defs>
						<polygon points="50 1 100 25 100 75 50 99 0 75 0 25" fill="url(#img5)"/>
					</svg>
					</a>
					</div>
					<h3>Koninklijke academie</h3>
				</div>

				<div class="kolom col-xs-12 col-sm-6 col-md-4 col-lg-4" style="margin-top: 1.6%; margin-bottom: 3.155%;">
					<div class="foto">
					<a href="{{ url('school') }}">
					<svg viewbox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
						<defs>
					    	<pattern id="img6" patternUnits="userSpaceOnUse" width="100" height="100">
					    		<image xlink:href="img/studiegebied5.jpg" y="-25" x="-25" width="150" height="150" />
					    	</pattern>
						</defs>
						<polygon points="50 1 100 25 100 75 50 99 0 75 0 25" fill="url(#img6)"/>
					</svg>
					</a>
					</div>
					<h3>Koninklijk conservatorium</h3>
				</div>

					
					
		</div>



		

		<div class="centerheader">
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