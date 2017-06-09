@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/testimonials.css') }}">
	<div class="container nieuwsitem">
		<div class="testimonialBeschrijving col-xs-12 col-sm-4 col-md-4 col-lg-4">
			@foreach($alleTestimonialMedia as $media)
			@if($media->mediaType == "Afbeelding")
			@if($media->isHoofdafbeelding == 1)
			<svg viewbox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
				<defs>
			    	<pattern id="img" patternUnits="userSpaceOnUse" width="100" height="100">
			    		<image xlink:href="{{ asset($media->link)  }}" y="-25" x="-25" width="150" height="150" />
			    	</pattern>
				</defs>
				<polygon points="50 1 100 25 100 75 50 99 0 75 0 25" fill="url(#img)"/>
			</svg>
			@endif
			@endif
			@endforeach
			<div class="beschrijvingPersoon">
				<p>{!! $geopendeTestimonial->beschrijving_persoon!!}</p>
			</div>
			<div class="informatiePersoon">
				<p>{{ $geopendeTestimonial->naam_persoon }}, 
				{{ $geopendeTestimonial->leeftijd_persoon }}</p>
				<p>{{ $geopendeTestimonial->functie_persoon }}</p>
			</div>
			
		</div>
		<div class="testimonialInhoud col-xs-12 col-sm-8 col-md-8 col-lg-8">
			<h1>{!! $geopendeTestimonial->titel !!}</h1>
			<div class="datum">Toegevoegd op: 
				{{ date('d-m-Y', strtotime($geopendeTestimonial->toegevoegdop)) }}
			</div>
			@foreach($alleTestimonialMedia as $media)
				@if($media->mediaType == "Video")
					<div class="testimonialVideo">
						<iframe src="https://www.youtube.com/embed/{{ asset($media->link)  }}"D2SlPFTCHDM" frameborder="0" allowfullscreen></iframe>
					</div>
				@elseif($media->mediaType == "Afbeelding")
					@if($media->isHoofdafbeelding == 1)
					<div class="heroImage">
						<img alt="heroimage ontbreekt" src="{{ asset($media->link)  }}">
					</div>
					@endif
				@endif
			@endforeach
			<p>{!! $geopendeTestimonial->tekstvorm_testimonial !!}</p>
			@foreach($alleTestimonialMedia as $media)
				@if($media->mediaType == "Afbeelding")
				<div class="miniatuurAfbeelding col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
					<img alt="kleine afbeelding testimonial ontbreekt" src="{{ asset($media->link)  }}" >
				</div>
				@endif
			@endforeach
		</div>
	</div>
@endsection