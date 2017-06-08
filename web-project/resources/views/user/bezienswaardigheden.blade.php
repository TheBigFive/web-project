@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/bezienswaardigheden.css') }}">
<div class="container">
	<div class="heroImage">
		<img src="{{ asset('img/bezienswaardigheden/bezienswaardigheid-6-4xnqJde ruien.jpg') }}">
	</div>
	<div class="introPagina">
		<h1>
			Bezienswaardigheden
		</h1>
		<h3>Antwerpen is de stad van die ene grote overtuiging dat alles altijd nét iets anders kan</h3>
	</div>

	@foreach($alleBezienswaardigheden as $key => $bezienswaardigheid)
	<div class="bezienswaardigheidKort col-xs-12 col-sm-4 col-md-4 col-lg-4">
		<svg viewbox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
			<defs>
			   	<pattern id="img" patternUnits="userSpaceOnUse" width="100" height="100">
		   		<image xlink:href="{{ asset($bezienswaardigheid->media_link) }}" y="-25" x="-25" width="150" height="150" />
			   	</pattern>
			</defs>
		<polygon points="50 1 100 25 100 75 50 99 0 75 0 25" fill="url(#img)"/>
		</svg>
		<h2><a href="/bezienswaardigheden/{{ $bezienswaardigheid->bezienswaardigheid_id }}">{{ $bezienswaardigheid->naam }}</a></h2>
	</div>
	@endforeach
</div>
@endsection