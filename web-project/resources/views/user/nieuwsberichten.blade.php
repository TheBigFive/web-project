@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/nieuwsartikel.css') }}" >
	<div class="container">
	<div class="heroImage">
		<img alt='afbeelding heroimage is zoek?' src="{{ asset('img/nieuwsitems/nieuwsitem-4-ZVEO76KtcdUU.jpg') }}">
	</div>
	<div class="nieuwsitems">
		<div class="introPagina">
		<h1>Nieuws</h1>
		<p>Heet van de naald, een must know of gewoon droge informatie waar je niet omheen kan? Met dit nieuws ben je weer helemaal up-to-date en kan je meepraten met je vrienden.</p>
		</div>
	@foreach($alleNieuwsitems as $key => $nieuwsitem)
		<div class="kolom col-xs-12 col-sm-6 col-md-4 col-lg-4">
			<div class="foto">
				<a href="nieuwsartikels/{{ $nieuwsitem->nieuwsitem_id }}">
					<svg viewbox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
						<defs>
					    	<pattern id="img{{ $nieuwsitem->nieuwsitem_id }}" patternUnits="userSpaceOnUse" width="100" height="100">
					    		<image xlink:href="{{ asset($nieuwsitem->media_link) }}" y="-25" x="-25" width="150" height="150" />
					    	</pattern>
						</defs>
						<polygon points="50 1 100 25 100 75 50 99 0 75 0 25" fill="url(#img{{ $nieuwsitem->nieuwsitem_id }})"/>
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
					<a href="nieuwsartikels/{{ $nieuwsitem->nieuwsitem_id }}">
						{{ $nieuwsitem->titel }}
					</a>
				</div>
				<div class="introtekst">
					{!! substr($nieuwsitem->introtekst,0,140).'...' !!}
				</div>
			</div>
		</div>
	@endforeach
	</div>
	</div>
@endsection
