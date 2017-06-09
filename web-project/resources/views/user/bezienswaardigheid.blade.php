@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/bezienswaardigheden.css') }}">
<div class="container bezienswaardigheidLang">
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<h1>{!! $geopendeBezienswaardigheid->naam !!}</h1>
		<p>{!! $geopendeBezienswaardigheid->beschrijving !!}</p>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<h3>Openingsuren:</h3>
			<p>{!! $geopendeBezienswaardigheid->openingsuren !!}</p>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<h3>Contact:</h3>
			<p>{!! $geopendeBezienswaardigheid->contact !!}</p>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<h3>Adres:</h3>
			<p>{!! $geopendeBezienswaardigheid->adres !!}</p>
		</div>

	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		@foreach($alleBezienswaardigheidMedia as $key => $media)
			@if($media->mediaType == "360")
				<div class="virtual">
					<h3>Klik op de foto hieronder om al eens op bezoek te gaan!</h3>
					<a href="/bezienswaardigheden/open360/{{ $media->media_id  }}"><img alt="$geopendeBezienswaardigheid->titel" src="{{ asset($media->link)  }}"><i class="streetview fa fa-street-view fa-5x" aria-hidden="true"></i></a>
				</div>
			@else
				@if($media->isHoofdafbeelding == 1)
					<img alt="hier mist een afbeelding voor: $geopendeBezienswaardigheid->titel" src="{{ asset($media->link)  }}">
				@else
					<div class="afbeeldingen col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<img alt="hier mist een afbeelding voor: $geopendeBezienswaardigheid->titel" src="{{ asset($media->link) }}">
					</div>
				@endif
			@endif
		@endforeach
	</div>

	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<iframe class="kaart" src="https://maps.google.com/maps?q={!! substr($geopendeBezienswaardigheid->coordinaten,0,6) !!},{!! substr($geopendeBezienswaardigheid->coordinaten, strpos($geopendeBezienswaardigheid->coordinaten, ",") + 1,5) !!}&hl=es;z=14&amp;output=embed"></iframe>
	</div>
</div>
@endsection