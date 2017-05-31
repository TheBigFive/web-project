@extends('layouts.app')
@section('content')
	<div class="container nieuwsitem">
		<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
			<img src="{{ asset('img/hero1.jpg') }}">
			<p>{{ date('d-m-Y', strtotime($geopendeNieuwsitem->toegevoegdop)) }}</p>
		</div>
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
			<h1>{{ $geopendeNieuwsitem->titel }}</h1>
			<b>{{ $geopendeNieuwsitem->introtekst }}</b>
			<p>{{ $geopendeNieuwsitem->artikel }}</p>
		</div>
	</div>
@endsection