@extends('layouts.app')
@section('content')
	<link rel="stylesheet" href="{{ asset('css/testimonials.css') }}">
<div class="container">
	<div class="heroImage">
		<img alt="afbeelding hero ontbreekt" src="{{ asset('img/testimonials/testimonial-14-127Ffantwerpen.jpg') }}">
	</div>
	<div class="introPagina">
		<h1>
			Verhalen
		</h1>
		<h3>Wat doen andere studenten in Antwerpen? Lees meer over hun projecten, interesses en verhalen en ontdek wat Antwerpen voor jou kan betekenen.</h3>
	</div>
	<div class="testimonials">
		@foreach($alleTestimonials as $key => $testimonial)
		<div class="kolom col-xs-12 col-sm-6 col-md-4 col-lg-4">
			<div class="foto">
				<a href="testimonials/{{ $testimonial->testimonial_id }}">
					<svg viewbox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
						<defs>
					    	<pattern id="img{{ $testimonial->testimonial_id }}" patternUnits="userSpaceOnUse" width="100" height="100">
					    		<image xlink:href="{{ asset($testimonial->media_link) }}" y="-80px" x="-70px" width="250px" height="250px" />
					    	</pattern>
						</defs>
						<polygon points="50 1 100 25 100 75 50 99 0 75 0 25" fill="url(#img{{ $testimonial->testimonial_id }})"/>
					</svg>
				</a>
			</div>
			<div class="tekst">
				<div class="datum">
				{{ date('d-m-Y', strtotime($testimonial->toegevoegdop))}}
				</div>
				<div class="auteur">
					{{ $testimonial->toegevoegddoor_voornaam }} {{ $testimonial->toegevoegddoor_achternaam }}
				</div>
				<div class="titel">
					<a href="testimonials/{{ $testimonial->testimonial_id }}">
						{{ $testimonial->titel }}
					</a>
				</div>
			</div>
		</div>
	@endforeach
	</div>
</div>
@endsection

