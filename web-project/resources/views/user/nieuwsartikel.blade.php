@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/nieuwsartikel.css') }}" >
<div class="container">
	<div class="geopendNieuwsitem">

		<div class="tekstvoor col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<h1 class="titel">{!! $geopendeNieuwsitem->titel !!}</h1>
			<p class="datum">Toegevoegd op: {{ date('d-m-Y', strtotime($geopendeNieuwsitem->toegevoegdop)) }}</p>
		</div>
		@foreach($alleNieuwsitemMedia as $media)
				@if($media->mediaType == "Afbeelding")
					@if($media->isHoofdafbeelding == 1)
						<div class="heroafbeelding col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<img alt='afbeelding heroafbeelding is zoek?' src="{{ asset($media->link)  }}"></img>
						</div>
					@endif
				@endif
			@endforeach
		<div class="inhoudNieuwsitem col-xs-12 col-sm-8 col-md-8 col-lg-8">
			<h2 class="introtekst">{!! $geopendeNieuwsitem->introtekst !!}</h2>
			<p class="artikeltekst">{!! $geopendeNieuwsitem->artikel !!}</p>
			<!-- <p class="tag">meer over: <a href="{{ url('nieuwsartikels/4') }}"><button class="tagbutton"> {!! $geopendeNieuwsitem->tag_naam !!}</button></a></p> -->
		</div>
		<div class="afbeeldingenNieuwsitem col-xs-12 col-sm-4 col-md-4 col-lg-4">
		@foreach($alleNieuwsitemMedia as $media)
				@if($media->mediaType == "Afbeelding")
					@if($media->isHoofdafbeelding == 0)
						<div class="enkeleAfbeelding">
							<img alt='extra image artikel is zoek' src="{{ asset($media->link)  }}"></img>
						</div>
					@endif
				@endif
			@endforeach

		</div>
	</div>
	</div>

</div>
@endsection