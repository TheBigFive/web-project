@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/bezienswaardigheden.css') }}">
<div class="container">
	<img class="heroImage"src="{{ asset('img/bezienswaardigheden/bezienswaardigheid-6-4xnqJde ruien.jpg') }}">
	<h1>
		bezienswaardigheden
	</h1>
	@foreach($alleBezienswaardigheden as $key => $bezienswaardigheid)
	<div class="bezienswaardigheidKort col-xs-12 col-sm-4 col-md-4 col-lg-4">
		<svg viewbox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
			<defs>
			   	<pattern id="img" patternUnits="userSpaceOnUse" width="100" height="100">
		   			<image xlink:href="{{ asset('img/bezienswaardigheden/bezienswaardigheid-6-4xnqJde ruien.jpg') }}" y="-25" x="-25" width="150" height="150" />
			   	</pattern>
			</defs>
		<polygon points="50 1 100 25 100 75 50 99 0 75 0 25" fill="url(#img)"/>
		</svg>
		<h2><a href="/bezienswaardigheden/{{ $bezienswaardigheid->bezienswaardigheid_id }}">{{ $bezienswaardigheid->naam }}</a></h2>
		<p>Beschrijving: {{ substr($bezienswaardigheid->beschrijving,0,140).'...' }}</p>
	</div>
	@endforeach
	<div class="informatie">
	@foreach($alleBezienswaardigheden as $key => $bezienswaardigheid)
	<div class="bezienswaardigheidLang col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<h1>{{ $bezienswaardigheid->naam }}</h1>
			<p>{{ $bezienswaardigheid->beschrijving }}</p>
		</div>
		<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
				<img src="{{ asset('img/bezienswaardigheden/bezienswaardigheid-6-4xnqJde ruien.jpg') }}">
				<img src="{{ asset('img/bezienswaardigheden/bezienswaardigheid-6-4xnqJde ruien.jpg') }}">
				<img src="{{ asset('img/bezienswaardigheden/bezienswaardigheid-6-4xnqJde ruien.jpg') }}">
		</div>
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
			<img src="{{ asset('img/bezienswaardigheden/bezienswaardigheid-6-4xnqJde ruien.jpg') }}">
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<img src="{{ asset('img/bezienswaardigheden/bezienswaardigheid-6-4xnqJde ruien.jpg') }}">
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<img src="{{ asset('img/bezienswaardigheden/bezienswaardigheid-6-4xnqJde ruien.jpg') }}">
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<img src="{{ asset('img/bezienswaardigheden/bezienswaardigheid-6-4xnqJde ruien.jpg') }}">
			</div>
		</div>
	</div>
	@endforeach
	</div>
</div>
@endsection