@extends('layouts.app')
@section('content')
	<div class="container">
		<table class="nieuwsbericht">
			<tr>
				<td>
					<img src="{{ asset('img/hero1.jpg') }}">
					<p> {{ $geopendeNieuwsitem->titel }} </p>
				</td>
			</tr>
			<tr>
				<td>
					<p> {{ $geopendeNieuwsitem->introtekst }} </p>
				</td>
				<td>
					<p> {{ $geopendeNieuwsitem->artikel }} </p>
				</td>
				<td>
					<p> {{ $geopendeNieuwsitem->toegevoegdop }} </p>
				</td>
			</tr>
		</table>
	</div>
@endsection