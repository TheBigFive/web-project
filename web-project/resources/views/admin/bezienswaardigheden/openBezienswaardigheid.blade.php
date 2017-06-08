@extends('layouts.admin')

@section('admincontent')
<div class="gebruikerswrapper bevatOpenBezienswaardigheidMap">

	<h2>Bezienswaardigheid: {{ $geopendeBezienswaardigheid->naam }}</h2>

	@if( session()->has('succesBericht'))
        	@if(!$errors->all())
        	<div class="alert alert-success">
		        {{ session()->get('succesBericht') }}
		    </div>
	    @endif
    @endif
    <div class="row">
    		<div class="col-md-6">
			    <h4>Bezienswaardigheid</h4>    
				<p>{{ $geopendeBezienswaardigheid->naam }}</p>
				<h4>Beschrijving</h4>
				<p>{!! $geopendeBezienswaardigheid->beschrijving !!}</p>
				<h4>Adres</h4>
				<p id="adres">{!! $geopendeBezienswaardigheid->adres !!}</p>
				<div id="openBezienswaardigheid-map"></div>
				<input id="coordinaten" type="hidden" name="coordinaten" value="{{ $geopendeBezienswaardigheid->coordinaten }}">
				@if ($geopendeBezienswaardigheid->openingsuren)
					<h4>Openingsuren</h4>
					<p>{!! $geopendeBezienswaardigheid->openigngsuren !!}</p>
				@endif
				@if ($geopendeBezienswaardigheid->vervoer)
					<h4>Info vervoer</h4>
					<p>{!! $geopendeBezienswaardigheid->vervoer !!}</p>
				@endif
				@if ($geopendeBezienswaardigheid->kostprijs)
					<h4>Kostprijs</h4>
					<p>{!! $geopendeBezienswaardigheid->kostprijs !!}</p>
				@endif
				@if ($geopendeBezienswaardigheid->contact)
					<h4>Contact</h4>
					<p>{!! $geopendeBezienswaardigheid->contact !!}</p>
				@endif
				<h4>Toegevoegd door</h4>
				<p>{{ $geopendeBezienswaardigheid->toegevoegddoor_voornaam }} {{ $geopendeBezienswaardigheid->toegevoegddoor_achternaam }}</p>
				<h4>Goedkeuringsstatus:</h4>
				<p>{{ $geopendeBezienswaardigheid->goedkeuringsstatus }}</p>
				<h4>Publicatiestatus:</h4>
				<p>{{ $geopendeBezienswaardigheid->publicatieStatus }}</p>
				@if ($geopendeBezienswaardigheid->redenVanAfwijzing)
					<h4>Reden van afwijzing: </h4>
					<p>{{ $geopendeBezienswaardigheid->redenVanAfwijzing }}</p>
				@endif
			</div>

		    <div class="col-md-6">
		    	<h3>Media</h3>
		     	<h4>Afbeeldingen</h4>
		     	@if($aantalAfbeeldingen > 0 )
			     	@foreach($alleBezienswaardigheidMedia as $key => $media)
			     		@if($media->mediaType == "Afbeelding")
							<img height="60px" src="{{ asset($media->link)  }}">
							@if($media->isHoofdafbeelding)
								Ingesteld als hoofdafbeelding
							@endif
						@endif
					@endforeach
				@else
					<p>Deze bezienswaardigheid heeft geen afbeeldingen.</p>
				@endif
				<h4>360 Foto's</h4>
				@if($erIsEen360Afbeelding)
			     	@foreach($alleBezienswaardigheidMedia as $key => $media)
			     		@if($media->mediaType == "360")
							<a href="/bezienswaardigheden/open360/{{ $media->media_id  }}"><img height="60px" src="{{ asset($media->link)  }}"></a>
						@endif
					@endforeach
				@else
					<p>Deze bezienswaardigheid heeft geen 360 foto.</p>
				@endif

			</div>
	</div>
	@if (Auth::user()->rol_id!=4)
			@if($geopendeBezienswaardigheid->goedkeuringsstatus == "Goedgekeurd")
				<span>
					<button type="button" id="afwijzingKnop" class="btn btn-danger">
	    				Bezienswaardigheid Afwijzen en reden meegeven
	  				</button>
				</span>
				<form class="afwijzingForm" action="/admin/bezienswaardigheden/afwijzen/{{ $geopendeBezienswaardigheid->bezienswaardigheid_id }}" method="post">     	
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
						<input type="submit" class="btn btn-danger" value="Bezienswaardigheid afwijzen">
					</span>	
				</form>
				@if ($geopendeBezienswaardigheid->publicatieStatus == "Gepubliceerd")
					<span>
						<a href="/admin/bezienswaardigheden/offlineHalen/{{ $geopendeBezienswaardigheid->bezienswaardigheid_id }}" class="btn btn-warning">Offline halen</a>
					</span>
				@else
					<span>
						<a href="/admin/bezienswaardigheden/publiceren/{{ $geopendeBezienswaardigheid->bezienswaardigheid_id }}" class="btn btn-primary">Publiceren</a>
					</span>
				@endif
				
			@else   
				@if($geopendeBezienswaardigheid->goedkeuringsstatus == "Nieuwe bezienswaardigheid")
					<span>
						<button type="button" id="afwijzingKnop" class="btn btn-danger">
		    				Bezienswaardigheid Afwijzen en reden meegeven
		  				</button>
					</span>
					<form class="afwijzingForm" action="/admin/bezienswaardigheden/afwijzen/{{ $geopendeBezienswaardigheid->bezienswaardigheid_id }}" method="post">     	
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
							<input type="submit" class="btn btn-danger" value="Bezienswaardigheid afwijzen">
						</span>	
					</form>
				@endif
				<span>
					<a href="/admin/bezienswaardigheden/goedkeuren/{{ $geopendeBezienswaardigheid->bezienswaardigheid_id }}" class="btn btn-success">Bezienswaardigheid goedkeuren</a>
				</span>
				@if ($geopendeBezienswaardigheid->publicatieStatus == "Gepubliceerd")
					<span>
						<a href="/admin/bezienswaardigheden/offlineHalen/{{ $geopendeBezienswaardigheid->bezienswaardigheid_id }}" class="btn btn-warning">Offline halen</a>
					</span>
				@else
					<span>
						<a href="/admin/bezienswaardigheden/publiceren/{{ $geopendeBezienswaardigheid->bezienswaardigheid_id }}" class="btn btn-success">Goedkeuren en publiceren</a>
					</span>
				@endif

			@endif

	@endif
	<span>
		<a href="/admin/bezienswaardigheden/wijzig/{{ $geopendeBezienswaardigheid->bezienswaardigheid_id }}" class="btn btn-primary">Wijzig Bezienswaardigheid</a>
	</span>
</div>
	

@endsection