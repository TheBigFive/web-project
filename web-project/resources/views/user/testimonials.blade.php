@extends('layouts.app')
@section('content')
	<link rel="stylesheet" href="{{ asset('css/testimonials.css') }}">
<div class="container">
	<div class="heroImage">
		<img src="{{ asset('img/testimonials/testimonial-14-127Ffantwerpen.jpg') }}">
	</div>
	<div class="introPagina">
		<h1>
			Verhalen
		</h1>
		<h3>Wat doen andere studenten in Antwerpen? Lees meer over hun projecten, interesses en verhalen en ontdek wat Antwerpen voor jou kan betekenen.</h3>
	</div>

	<div class="alleItems">
		<div class="1item">
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
				<a href="#id1" class="testimonialItem" data-toggle="collapse">Klik om uit te schuiven</a>
			</div>
			<div id="id1" class="testimonialInhoud col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h1>EEN HOOP CONTENT</h1>
				<h2>meer inhoud</h2>
				<h3>en nog een beetje</h3>
			</div>
		</div>
		<div class="1item">
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
				<a href="#id2" class="testimonialItem" data-toggle="collapse">Klik om uit te schuiven</a>
			</div>
			<div id="id2" class="testimonialInhoud col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h1>EEN HOOP CONTENT</h1>
				<h2>meer inhoud</h2>
				<h3>en nog een beetje</h3>
			</div>
		</div>
		<div class="1item">
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
				<a href="#id3" class="testimonialItem" data-toggle="collapse">Klik om uit te schuiven</a>
			</div>
			<div id="id3" class="testimonialInhoud col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h1>EEN HOOP CONTENT</h1>
				<h2>meer inhoud</h2>
				<h3>en nog een beetje</h3>
			</div>
		</div>
		<div class="1item">
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
				<a href="#id4" class="testimonialItem" data-toggle="collapse">Klik om uit te schuiven</a>
			</div>
			<div id="id4" class="testimonialInhoud col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h1>EEN HOOP CONTENT</h1>
				<h2>meer inhoud</h2>
				<h3>en nog een beetje</h3>
			</div>
		</div>
	</div>
</div>
@endsection

