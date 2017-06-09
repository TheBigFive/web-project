@extends('layouts.app')
@section('content')
       <link rel="stylesheet" href="{{ asset('css/school.css') }}" >
	<div class="container row">
		<div class="schoolapartcontainer">
			<div class="kind col-xs-12 col-sm-4 col-md-4 col-lg-4">
				<h1>{{ $geopendeSchool->naam }}</h1>
			</div>

			<div class="kind col-xs-12 col-sm-4 col-md-4 col-lg-4">
				<a href="{{ $geopendeSchool->website }}">
					<svg viewbox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
						<defs>
					    	<pattern id="img" patternUnits="userSpaceOnUse" width="100" height="100">
					    		@foreach ($alleSchoolMedia as $key => $media)
					    			@if( $media->mediaType == "Afbeelding" )
					    				<image xlink:href="{{ asset(($media->link)) }}" y="-80px" x="-70px" width="250px" height="250px" />
					    			@endif
					    		@endforeach
					    	</pattern>
						</defs>
						<polygon points="50 1 100 25 100 75 50 99 0 75 0 25" fill="url(#img)"/>
					</svg>
				</a>
			</div>
			<div class="kind col-xs-12 col-sm-4 col-md-4 col-lg-4">
				<p>
					{!! $geopendeSchool->beschrijving !!}
				</p>
			</div>
		</div>


		<div class="centerheader row">
			<p>____________________________________________________________________</p>
				<h1>Studiegebieden</h1>
			<p>____________________________________________________________________</p>

				@foreach($alleInteressegebieden as $key => $interessegebied)
					<div class="kolom col-xs-12 col-sm-6 col-md-4 col-lg-4">
						<div class="foto">
						<a href="{{ $interessegebied->link }}">
						<svg viewbox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
							<defs>
						    	<pattern id="img{{ $key }}" patternUnits="userSpaceOnUse" width="100" height="100">
						    		<image xlink:href="{{ asset(($interessegebied->media_link)) }}" y="-25" x="-25" width="150" height="150" />
						    	</pattern>
							</defs>
							<polygon points="50 1 100 25 100 75 50 99 0 75 0 25" fill="url(#img{{ $key }})"/>
						</svg>
						</a>
						</div>
						<h3>{{ $interessegebied->naam }}</h3>
					</div>
				@endforeach	
					
		</div>



		

		<div class="row centerheader">
			<p>____________________________________________________________________</p>
			<h1>Campussen</h1>
			<p>____________________________________________________________________</p>
		</div>
		<input type="text" name="school" id="schoolId" value="{{ $geopendeSchool->school_id }}" hidden>
		<div id="campus-map"></div>
		<script src="{{ asset('vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>
		<script  type="text/javascript" async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBShkDsUqnZDbfk2mnY2zXDQgck-U0NDEo"
  ></script>
		<script src="{{ asset('js/gmaps.js') }}"></script>
		<script src="{{ asset('js/campus-map.js') }}"></script>


</div>
@endsection