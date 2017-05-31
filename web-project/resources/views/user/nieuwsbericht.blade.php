@extends('layouts.app')
@section('content')
	<div class="container nieuwsbericht">
		<div class="kolom1 col-xs-5 col-sm-5 col-md-5 col-lg-5 ">
			@foreach($alleNieuwsitemMedia as $key => $media)
		<div class="mySlides">
	     		@if($media->mediaType == "Afbeelding")
						<img src="{{ asset($media->link)  }}">
				@endif
					</div>
			@endforeach

			<p> {{ $geopendeNieuwsitem->titel }} </p>
		</div>
		<div class="kolom2 col-xs-7 col-sm-7 col-md-7 col-lg-7"
			<p> {{ $geopendeNieuwsitem->introtekst }} </p>
			<p> {{ $geopendeNieuwsitem->artikel }} </p>
			<p> {{ $geopendeNieuwsitem->toegevoegdop }} </p>
		</div>
	</div>
@endsection