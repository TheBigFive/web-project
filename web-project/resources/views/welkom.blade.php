@extends('layouts.app')
@section('content')
  		<div class="hero container">
  			<div class="mySlides fade">
	  			<div class="afbeeldingHero container">
					<img src="{{ asset('img/hero3.png') }}" alt="hero afbeelding">
				</div>
			</div>
  			<div class="mySlides fade">
	  			<div class="afbeeldingHero container">
					<img src="{{ asset('img/hero4.png') }}" alt="hero afbeelding">
				</div>
			</div>
  			<div class="mySlides fade">
	  			<div class="afbeeldingHero container">
					<img src="{{ asset('img/hero5.png') }}" alt="hero afbeelding">
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
	    <h1>Antwerpen, dé stad voor studenten!</h1>
	    <p>Antwerpen is niet alleen dé stad van de mode, kunst en schelde maar ook van de student! Kom in Antwerpen studeren en ontdek de mooie bekende en onbekende parels die Antwerpen te bieden heeft!</p>

  </div>
@endsection