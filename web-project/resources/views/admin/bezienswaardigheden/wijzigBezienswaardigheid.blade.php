@extends('layouts.admin')
@section('admincontent')

<div class="gebruikerswrapper bevatWijzigBezienswaardigheidMap">

	<h2>Bezienswaardigheden wijzigen</h2>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<form action="/admin/bezienswaardigheden/wijzig/{{ $geopendeBezienswaardigheid->bezienswaardigheid_id }}" method="post">
					@if( session()->has('succesBericht'))
			        	@if(!$errors->all())
			        		<div class="alert alert-success">
					            De bezienswaardighed werd succesvol gewijzigd.
					        </div>
				    	@endif
			        @endif
					{!! csrf_field() !!}
					<div class="form-group">
					    <label for="naam">Naam bezienswaardigheid</label>
					    <input type="text" name="naam" class="form-control" placeholder="Typ hier de naam van de bezienswaardigheid" value="{{ $geopendeBezienswaardigheid->naam }}">
					    @if ($errors->has('naam'))
						    <span class="help-block">
						        <strong>{{ $errors->first('naam') }}</strong>
						    </span>
						@endif
					</div>
					<div class="form-group">
					    <label for="beschrijving">Beschrijving</label>
					    <textarea rows="5" name="beschrijving" class="form-control summernote" placeholder="Typ hier de beschrijving van de bezienswaardigheid">{{ $geopendeBezienswaardigheid->beschrijving }}</textarea>
					    @if ($errors->has('beschrijving'))
						    <span class="help-block">
						        <strong>{{ $errors->first('beschrijving') }}</strong>
						    </span>
						@endif
					</div>
					<div class="form-group">
					    <label for="openingsuren">Openingsuren</label>
					    <textarea rows="5" name="openingsuren" class="form-control summernote" placeholder="Typ hier de openingsuren van de bezienswaardigheid">{{ $geopendeBezienswaardigheid->openingsuren }}</textarea>
					    @if ($errors->has('openingsuren'))
						    <span class="help-block">
						        <strong>{{ $errors->first('openingsuren') }}</strong>
						    </span>
						@endif
					</div>

					<div class="form-group">
					    <label for="vervoer">Vervoer</label>
					    <textarea rows="5" name="vervoer" class="form-control summernote" placeholder="Typ hier de vervoersmogelijkheden van de bezienswaardigheid">{{ $geopendeBezienswaardigheid->vervoer }}</textarea>
					    @if ($errors->has('vervoer'))
						    <span class="help-block">
						        <strong>{{ $errors->first('vervoer') }}</strong>
						    </span>
						@endif
					</div>
					<div class="form-group">
					    <label for="kostprijs">Kostprijs</label>
					    <textarea rows="5" name="kostprijs" class="form-control summernote" placeholder="Typ hier de kostprijzen van de bezienswaardigheid">{{ $geopendeBezienswaardigheid->kostprijs }}</textarea>
					    @if ($errors->has('kostprijs'))
						    <span class="help-block">
						        <strong>{{ $errors->first('kostprijs') }}</strong>
						    </span>
						@endif
					</div>
					<div class="form-group">
					    <label for="adres">Locatie</label>
					    <p>Geef het volledige adres in van de bezienswaardigheid</p>
					    <input type="text" name="locatie-text" id="locatie-text" placeholder="vb. Grote Markt 1, 2000 Antwerpen" class="form-control" value="{{ $geopendeBezienswaardigheid->adres }}" /><br/>
					    <button id="locatieBezienswaardigheidKnop" class="btn btn-primary">Zoek locatie op</button>
					    <div id="wijzigBezienswaardigheid-map"></div>
					    <input id="locatie-input" type="hidden" name="coordinaten" value="{{ $geopendeBezienswaardigheid->coordinaten }}">
					</div>
					
					<div class="form-group">
					    <label for="contact">Contact</label>
					    <textarea rows="5" name="contact" class="form-control summernote" placeholder="Typ hier de contactmogelijkheden van de bezienswaardigheid"> {{ $geopendeBezienswaardigheid->contact }}</textarea>
					    @if ($errors->has('contact'))
						    <span class="help-block">
						        <strong>{{ $errors->first('contact') }}</strong>
						    </span>
						@endif
					</div>
					
					<div class="form-group">
						@if (Auth::user()->rol_id!=4)
						  	<span>
						        <a href="/admin/bezienswaardigheden/verwijder/{{ $geopendeBezienswaardigheid->bezienswaardigheid_id }}" class="btn btn-danger">Bezienswaardigheid verwijderen</a>
							</span>
						@endif
					    <input type="submit" class="btn btn-primary" value="Wijzig Bezienswaardigheid">
					</div>
				</form>
			</div>
			<div class="col-md-4">
				<h4>Afbeeldingen</h4>
				@if($aantalAfbeeldingen > 0 )
					@foreach($alleBezienswaardigheidMedia as $media)
						@if($media->mediaType == "Afbeelding")
							<img height="60px" src="{{ asset($media->link)  }}">
							<a href="/admin/bezienswaardigheden/verwijderMedia/{{ $media->media_id }}">verwijderen</a>
							@if($media->isHoofdafbeelding == false)
								<a href="/admin/bezienswaardigheden/stelHoofdafbeeldingIn/{{ $media->media_id }}">Instellen als hoofdafbeelding</a>
							@endif
						@endif
					@endforeach
				@else
					<p>Dit bezienswaardigheid heeft geen afbeeldingen.</p>
				@endif
				<h4>360 Foto's</h4>
				@if($erIsEen360Afbeelding)
			     	@foreach($alleBezienswaardigheidMedia as $key => $media)
			     		@if($media->mediaType == "360")
							<a href="/bezienswaardigheden/open360/{{ $media->media_id  }}"><img height="60px" src="{{ asset($media->link)  }}"></a>
							<a href="/admin/bezienswaardigheden/verwijderMedia/{{ $media->media_id }}">verwijderen</a>
						@endif
					@endforeach
				@else
					<p>Deze bezienswaardigheid heeft geen 360 foto.</p>
				@endif
			</div>
		</div>

		<h3>Extra media toevoegen</h3>
			<form action="/admin/bezienswaardigheden/toevoegenMedia/{{ $geopendeBezienswaardigheid->bezienswaardigheid_id }}" method="post" enctype="multipart/form-data">
				{!! csrf_field() !!}
    			<div class="row">
    				<div class="col-md-3">
    					<h4>Afbeelding toevoegen</h4>				
						<div class="form-group{{ $errors->has('afbeeldingen') ? ' has-error' : '' }}">
							<label for="afbeeldingen">Voeg één of meerdere afbeeldingen toe</label>
							<input type="file" name="afbeeldingen[]" multiple="true" /><br/>
							@if ($errors->has('afbeeldingen'))
							    <span class="help-block">
								    <strong>{{ $errors->first('afbeeldingen') }}</strong>
							    </span>
							@endif
						</div>
    				</div>
    				<div class="col-md-3">
    					@if(!$erIsEen360Afbeelding)
	    					<h4>360 Foto</h4>
							<div class="form-group{{ $errors->has('afbeelding360') ? ' has-error' : '' }}">
								<label for="afbeelding360">Voeg een 360 foto toe</label>
								<input type="file" name="afbeelding360"/><br/>
								@if ($errors->has('afbeelding360'))
								    <span class="help-block">
									    <strong>{{ $errors->first('afbeelding360') }}</strong>
								    </span>
								@endif
							</div>
						@endif
    				</div>    							
    			</div>
    			<input type="submit" class="btn btn-primary" value="Media Toevoegen">
			</form>	
	</div>
</div>

@endsection