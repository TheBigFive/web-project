@extends('layouts.app')
@section('content')
  		<div class="hero container">
  			<div class="mySlides fade">
	  			<div class="afbeeldingHero container">
					<img src="{{ asset('img/heroimages/hero3.png') }}" alt="hero afbeelding">
				</div>
			</div>
  			<div class="mySlides fade">
	  			<div class="afbeeldingHero container">
					<img src="{{ asset('img/heroimages/hero4.png') }}" alt="hero afbeelding">
				</div>
			</div>
  			<div class="mySlides fade">
	  			<div class="afbeeldingHero container">
					<img src="{{ asset('img/heroimages/hero5.png') }}" alt="hero afbeelding">
				</div>
			</div>
		</div>

		<div class="buttons">
				<span class="dot"></span> 
				<span class="dot"></span> 
				<span class="dot"></span> 
		</div>


  	<div class="container inhoud">
	    <h1>Antwerpen, dé stad voor studenten!</h1>
	    <p>Antwerpen is niet alleen dé stad van de mode, kunst en schelde maar ook van de student! Kom in Antwerpen studeren en ontdek de mooie bekende en onbekende parels die Antwerpen te bieden heeft!</p>
		
		@foreach($alleNieuwsitems as $key => $nieuwsitem)
		@if($key<3)
		<div class="kolom col-xs-12 col-sm-6 col-md-4 col-lg-4">
			<div class="foto">
				<a href="nieuwsbericht/{{ $nieuwsitem->nieuwsitem_id }}">
					<svg viewbox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
						<defs>
					    	<pattern id="img" patternUnits="userSpaceOnUse" width="100" height="100">
					    		<image xlink:href="img/heroimages/hero7.jpg" y="-25" x="-25" width="150" height="150" />
					    	</pattern>
						</defs>
						<polygon points="50 1 100 25 100 75 50 99 0 75 0 25" fill="url(#img)"/>
					</svg>
				</a>
			</div>
			<div class="nieuws tekst">
				<div class="datum">
				{{ date('d-m-Y', strtotime($nieuwsitem->toegevoegdop))}}
				</div>
				<div class="auteur">
					{{ $nieuwsitem->toegevoegddoor_voornaam }} {{ $nieuwsitem->toegevoegddoor_achternaam }}
				</div>
				<div class="titel">
					<a href="nieuwsbericht/{{ $nieuwsitem->nieuwsitem_id }}">
						{{ $nieuwsitem->titel }}
					</a>
				</div>
				<div class="introtekst">
					{{ substr($nieuwsitem->introtekst,0,180).'...' }}
				</div>
			</div>
		</div>
		@endif
	@endforeach
  </div>
@endsection