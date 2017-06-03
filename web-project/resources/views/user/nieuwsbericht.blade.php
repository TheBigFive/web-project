@extends('layouts.app')
@section('content')
	<div class="container nieuwsitem">
		<div class="col-lg-1">
		</div>
		<div class="col-xs-12 col-sm-5 col-md-5 col-lg-4">
			<svg viewbox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
				<defs>
			    	<pattern id="img" patternUnits="userSpaceOnUse" width="100" height="100">
			    		<image xlink:href="{{ asset('img/hero1.jpg') }}" y="-25" x="-25" width="150" height="150" />
			    	</pattern>
				</defs>
				<polygon points="50 1 100 25 100 75 50 99 0 75 0 25" fill="url(#img)"/>
			</svg>
			<p>{{ date('d-m-Y', strtotime($geopendeNieuwsitem->toegevoegdop)) }}</p>

			@foreach($alleNieuwsitemMedia as $media)
				@if($media->mediaType == "Afbeelding")
					<img src="{{ asset($media->link)  }}" >
				@endif
			@endforeach
		</div>
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-6">
			<h1>{!! $geopendeNieuwsitem->titel !!}</h1>
			<b>{!! $geopendeNieuwsitem->introtekst !!}</b>
			<p>{!! $geopendeNieuwsitem->artikel !!}</p>
			
		</div>
		<div class="col-lg-1">
		</div>
	</div>
@endsection