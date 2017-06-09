@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/bezienswaardigheden.css') }}">
<div class="container">
	<div class="heroImage">
		<img alt="hero image bezienswaardigheden" src="{{ asset('img/bezienswaardigheden/bezienswaardigheid-6-4xnqJde ruien.jpg') }}">
	</div>
	<div class="introPagina">
		<h1>
			Bezienswaardigheden
		</h1>
		<h3>Antwerpen is de stad van die ene grote overtuiging dat alles altijd nét iets anders kan</h3>
	</div>

	@foreach($alleBezienswaardigheden as $key => $bezienswaardigheid)
	<div class="bezienswaardigheidKort col-xs-12 col-sm-4 col-md-4 col-lg-4">
		<a href="/bezienswaardigheden/{{ $bezienswaardigheid->bezienswaardigheid_id }}">
			<svg viewbox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
				<defs>
				   	<pattern id="{{ $bezienswaardigheid->bezienswaardigheid_id }}" patternUnits="userSpaceOnUse" width="100" height="100">
			   		<image xlink:href="{{ asset($bezienswaardigheid->media_link) }}" y="-50px" x="-50px" width="200px" height="200px" />
				   	</pattern>
				</defs>
			<polygon points="50 1 100 25 100 75 50 99 0 75 0 25" fill="url(#{{ $bezienswaardigheid->bezienswaardigheid_id }})"/>
			</svg>
		</polygon>
		<h2 class="titel"><a href="/bezienswaardigheden/{{ $bezienswaardigheid->bezienswaardigheid_id }}">{{ $bezienswaardigheid->naam }}</a></h2>
	</div>
	@endforeach
</div>
@endsection