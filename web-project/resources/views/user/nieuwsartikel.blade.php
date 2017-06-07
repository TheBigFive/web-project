@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/nieuwsartikel.css') }}" >
<div class="container">
	<div class="geopendNieuwsitem">
		@foreach($alleNieuwsitemMedia as $media)
				@if($media->mediaType == "Afbeelding")
					@if($media->isHoofdafbeelding == 1)
						<div class="heroafbeelding col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<img src="{{ asset($media->link)  }}"></img>

							<div class="titel col-xs-12 col-sm-8 col-md-6 col-lg-6">
							<h1>{!! $geopendeNieuwsitem->titel !!}</h1>
							</div>
						</div>
					@endif
				@endif
			@endforeach
		<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
			<p>{!! $geopendeNieuwsitem->tag_naam !!}</p>
			<h2>{!! $geopendeNieuwsitem->introtekst !!}</h2>
			<p>{!! $geopendeNieuwsitem->artikel !!}</p>
		</div>
	</div>
		<div class="extraNieuwsitems col-xs-12 col-sm-4 col-md-4 col-lg-4">
			<h2>Nieuwe artikels</h2>
			<div class="eerste col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<a><h3>{!! $geopendeNieuwsitem->titel !!}</h3></a>
				<p>{!! $geopendeNieuwsitem->tag_naam !!}</p>
			</div>
			<div class="eerste col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<a><h3>{!! $geopendeNieuwsitem->titel !!}</h3></a>
				<p>{!! $geopendeNieuwsitem->tag_naam !!}</p>
			</div>
			<div class="eerste col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<a><h3>{!! $geopendeNieuwsitem->titel !!}</h3></a>
				<p>{!! $geopendeNieuwsitem->tag_naam !!}</p>
			</div>
			<div class="eerste col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<a><h3>{!! $geopendeNieuwsitem->titel !!}</h3></a>
				<p>{!! $geopendeNieuwsitem->tag_naam !!}</p>
			</div>
			<div class="eerste col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<a><h3>{!! $geopendeNieuwsitem->titel !!}</h3></a>
				<p>{!! $geopendeNieuwsitem->tag_naam !!}</p>
			</div>

		</div>
</div>
@endsection