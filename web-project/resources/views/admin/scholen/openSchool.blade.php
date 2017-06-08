@extends('layouts.admin')

@section('admincontent')
<div class="gebruikerswrapper">

	<h2>School: {{ $geopendeSchool->naam }}</h2>

	@if( session()->has('succesBericht'))
        	@if(!$errors->all())
        	<div class="alert alert-success">
		        {{ session()->get('succesBericht') }}
		    </div>
	    @endif
    @endif
    <div class="row">
    		<div class="col-md-6">
			    <h4>Naam school</h4>    
				<p>{{ $geopendeSchool->naam }}</p>
				<h4>Beschrijving</h4>
				<p>{!! $geopendeSchool->beschrijving !!}</p>
				<h4>website</h4>
				<p><a href="{{ $geopendeSchool->website }}">{{ $geopendeSchool->website }}</a></p>
				<h4>Toegevoegd door</h4>
				<p>{{ $geopendeSchool->toegevoegddoor_voornaam }} {{ $geopendeSchool->toegevoegddoor_achternaam }}</p>
				<h4>Goedkeuringsstatus:</h4>
				<p>{{ $geopendeSchool->goedkeuringsstatus }}</p>
				<h4>Publicatiestatus:</h4>
				<p>{{ $geopendeSchool->publicatieStatus }}</p>
				@if ($geopendeSchool->redenVanAfwijzing)
					<h4>Reden van afwijzing: </h4>
					<p>{{ $geopendeSchool->redenVanAfwijzing }}</p>
				@endif
			</div>

		    <div class="col-md-6">
		    	<h3>Media</h3>
		     	<h4>Logo</h4>
			    @foreach($alleSchoolMedia as $key => $media)
			    	@if($media->mediaType == "schoolLogo")
						<img height="60px" src="{{ asset($media->link)  }}">
					@endif
				@endforeach
				<h4>Afbeeldingen</h4>
				@foreach($alleSchoolMedia as $key => $media)
			     	@if($media->mediaType == "Afbeelding")
						<img height="60px" src="{{ asset($media->link)  }}">
					@endif
				@endforeach

			</div>
	</div>
	@if (Auth::user()->rol_id!=4)
			@if($geopendeSchool->goedkeuringsstatus == "Goedgekeurd")
				<span>
					<button type="button" id="afwijzingKnop" class="btn btn-danger">
	    				Scholen Afwijzen en reden meegeven
	  				</button>
				</span>
				<form class="afwijzingForm" action="/admin/scholen/afwijzen/{{ $geopendeSchool->school_id }}" method="post">     	
				 	{!! csrf_field() !!}
					<div class="form-group">
					    <label for="titel">Reden van afwijzing</label>
					    <textarea rows="5" name="redenVanAfwijzing" class="form-control" placeholder="Typ hier de reden van Afwijzing"></textarea>
					    @if ($errors->has('redenVanAfwijzing'))
						    <span class="help-block">
						        <strong>{{ $errors->first('redenVanAfwijzing') }}</strong>
						    </span>
						@endif
					</div>
					<button type="button" id="afwijzingAnnulerenKnop" class="btn btn-primary">
	    				Afwijzing annuleren
	  				</button>
					<span>
						<input type="submit" class="btn btn-danger" value="scholen afwijzen">
					</span>	
				</form>
				@if ($geopendeSchool->publicatieStatus == "Gepubliceerd")
					<span>
						<a href="/admin/scholen/offlineHalen/{{ $geopendeSchool->school_id }}" class="btn btn-warning">Offline halen</a>
					</span>
				@else
					<span>
						<a href="/admin/scholen/publiceren/{{ $geopendeSchool->school_id }}" class="btn btn-primary">Publiceren</a>
					</span>
				@endif
				
			@else   
				@if($geopendeSchool->goedkeuringsstatus == "Nieuwe school")
					<span>
						<button type="button" id="afwijzingKnop" class="btn btn-danger">
		    				School Afwijzen en reden meegeven
		  				</button>
					</span>
					<form class="afwijzingForm" action="/admin/scholen/afwijzen/{{ $geopendeSchool->school_id }}" method="post">     	
					 	{!! csrf_field() !!}
						<div class="form-group">
						    <label for="titel">Reden van afwijzing</label>
						    <textarea rows="5" name="redenVanAfwijzing" class="form-control" placeholder="Typ hier de reden van Afwijzing"></textarea>
						    @if ($errors->has('redenVanAfwijzing'))
							    <span class="help-block">
							        <strong>{{ $errors->first('redenVanAfwijzing') }}</strong>
							    </span>
							@endif
						</div>
						<button type="button" id="afwijzingAnnulerenKnop" class="btn btn-primary">
		    				Afwijzing annuleren
		  				</button>
						<span>
							<input type="submit" class="btn btn-danger" value="scholen afwijzen">
						</span>	
					</form>
				@endif
				<span>
					<a href="/admin/scholen/goedkeuren/{{ $geopendeSchool->school_id }}" class="btn btn-success">scholen goedkeuren</a>
				</span>
				@if ($geopendeSchool->publicatieStatus == "Gepubliceerd")
					<span>
						<a href="/admin/scholen/offlineHalen/{{ $geopendeSchool->school_id }}" class="btn btn-warning">Offline halen</a>
					</span>
				@else
					<span>
						<a href="/admin/scholen/publiceren/{{ $geopendeSchool->school_id }}" class="btn btn-success">Goedkeuren en publiceren</a>
					</span>
				@endif

			@endif

	@endif
	<span>
		<a href="/admin/scholen/wijzig/{{ $geopendeSchool->school_id }}" class="btn btn-primary">Wijzig scholen</a>
	</span>
</div>
	

@endsection