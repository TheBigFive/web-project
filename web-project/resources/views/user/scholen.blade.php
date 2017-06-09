@extends('layouts.app')
@section('content')

<div class="schoolheroimage container-fluid">
	<img src="img/schoolhero2.jpg">
</div>

	<div class="container">
	<div class="nieuwsitems">
	
		<div class="container inhoud">
			<h4>Antwerpen heeft een zeer groot aanbod aan hogescholen en universiteiten waardoor wij bijna elke opleiding kunnen aanbieden!</h4>
		</div>
		@foreach($alleScholen as $key => $school)
			@if($school->publicatieStatus == "Gepubliceerd")
				<div class="kolom col-xs-12 col-sm-6 col-md-4 col-lg-4">
					<div class="foto">
						<a href="school/{{ $school->school_id }}">
							<svg viewbox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
								<defs>
							    	<pattern id="img{{ $key }}" patternUnits="userSpaceOnUse" width="100" height="100">
							    		<image xlink:href="{{ asset(($school->media_link)) }}" y="-25" x="-25" width="150" height="150" />
							    	</pattern>
								</defs>
								<polygon points="50 1 100 25 100 75 50 99 0 75 0 25" fill="url(#img{{ $key }})"/>
							</svg>
						</a>
					</div>
					<div class="nieuws tekst">
						<h2 class="titel">
							<a href="school/{{ $school->school_id }}">
								{{ $school->naam }}
							</a>
						</h2>
						<div class="introtekst">
							{!! $school->beschrijving !!} 
						</div>
					</div>
				</div>
			@endif
		@endforeach 

	</div>
	</div>
@endsection
