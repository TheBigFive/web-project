@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/bezienswaardigheden.css') }}">
<div class="container">
	<h4>Bezienswaardigheid</h4> 
				<p>{{ $geopendeBezienswaardigheid->naam }}</p>
				<h4>Beschrijving</h4>
				<p>{!! $geopendeBezienswaardigheid->beschrijving !!}</p>
				<h4>Adres</h4>
				<p id="adres">{!! $geopendeBezienswaardigheid->adres !!}</p>
			     @foreach($alleBezienswaardigheidMedia as $key => $media)
			     		@if($media->mediaType == "Afbeelding")
							<img height="60px" src="{{ asset($media->link)  }}"></div>
							@if($media->isHoofdafbeelding)
								<p>Ingesteld als hoofdafbeelding</p>
							@endif
						@endif
				@endforeach
</div>
@endsection