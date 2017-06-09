@extends('layouts.admin')
@section('admincontent')

<div class="row heading-bg  bg-blue">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h2 class="txt-light" style="margin-top: 3%; margin-left: 29%; width: 100%;">Bezienswaardigheid wijzigen</h2>
    </div>
</div>

<div class="gebruikerswrapper bevatWijzigBezienswaardigheidMap">

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
					    <label for="naam" class="nieuwstoevoegen">Naam bezienswaardigheid</label>
					    <input type="text" name="naam" class="form-control" placeholder="Typ hier de naam van de bezienswaardigheid" value="{{ $geopendeBezienswaardigheid->naam }}">
					    @if ($errors->has('naam'))
						    <span class="help-block">
						        <strong>{{ $errors->first('naam') }}</strong>
						    </span>
						@endif
					</div>
					<div class="form-group">
					    <label for="beschrijving" class="nieuwstoevoegen">Beschrijving</label>
					    <textarea rows="5" name="beschrijving" class="form-control summernote" placeholder="Typ hier de beschrijving van de bezienswaardigheid">{{ $geopendeBezienswaardigheid->beschrijving }}</textarea>
					    @if ($errors->has('beschrijving'))
						    <span class="help-block">
						        <strong>{{ $errors->first('beschrijving') }}</strong>
						    </span>
						@endif
					</div>
					<div class="form-group">
					    <label for="openingsuren" class="nieuwstoevoegen">Openingsuren</label>
					    <textarea rows="5" name="openingsuren" class="form-control summernote" placeholder="Typ hier de openingsuren van de bezienswaardigheid">{{ $geopendeBezienswaardigheid->openingsuren }}</textarea>
					    @if ($errors->has('openingsuren'))
						    <span class="help-block">
						        <strong>{{ $errors->first('openingsuren') }}</strong>
						    </span>
						@endif
					</div>

					<div class="form-group">
					    <label for="vervoer" class="nieuwstoevoegen">Vervoer</label>
					    <textarea rows="5" name="vervoer" class="form-control summernote" placeholder="Typ hier de vervoersmogelijkheden van de bezienswaardigheid">{{ $geopendeBezienswaardigheid->vervoer }}</textarea>
					    @if ($errors->has('vervoer'))
						    <span class="help-block">
						        <strong>{{ $errors->first('vervoer') }}</strong>
						    </span>
						@endif
					</div>
					<div class="form-group">
					    <label for="kostprijs" class="nieuwstoevoegen">Kostprijs</label>
					    <textarea rows="5" name="kostprijs" class="form-control summernote" placeholder="Typ hier de kostprijzen van de bezienswaardigheid">{{ $geopendeBezienswaardigheid->kostprijs }}</textarea>
					    @if ($errors->has('kostprijs'))
						    <span class="help-block">
						        <strong>{{ $errors->first('kostprijs') }}</strong>
						    </span>
						@endif
					</div>
					<div class="form-group">
					    <label for="adres" class="nieuwstoevoegen">Locatie</label>
					    <p>Geef het volledige adres in van de bezienswaardigheid</p>
					    <input type="text" name="locatie-text" id="locatie-text" placeholder="vb. Grote Markt 1, 2000 Antwerpen" class="form-control zoeklocatieveld" style="margin-right: 0.5%;" value="{{ $geopendeBezienswaardigheid->adres }}" />
					    <button id="locatieBezienswaardigheidKnop" class="btn btn-primary">Zoek locatie op</button>
					    <div id="wijzigBezienswaardigheid-map" style="margin-top: 2%;""></div>
					    <input id="locatie-input" type="hidden" name="coordinaten" value="{{ $geopendeBezienswaardigheid->coordinaten }}">
					</div>
					
					<div class="form-group">
					    <label for="contact" class="nieuwstoevoegen">Contact</label>
					    <textarea rows="5" name="contact" class="form-control summernote" placeholder="Typ hier de contactmogelijkheden van de bezienswaardigheid"> {{ $geopendeBezienswaardigheid->contact }}</textarea>
					    @if ($errors->has('contact'))
						    <span class="help-block">
						        <strong>{{ $errors->first('contact') }}</strong>
						    </span>
						@endif
					</div>
					
					<div class="form-group" style="text-align: center;">
						@if (Auth::user()->rol_id!=4)
						  	<span>
						        <a href="/admin/bezienswaardigheden/verwijder/{{ $geopendeBezienswaardigheid->bezienswaardigheid_id }}" class="btn btn-danger">Bezienswaardigheid verwijderen</a>
							</span>
						@endif
					    <input type="submit" class="btn btn-primary" value="Wijzig Bezienswaardigheid">
					</div>
				</form>
			</div>

			<div class="col-md-4 nieuwstoevoegen">
				<h4>Afbeeldingen</h4>
				@if($aantalAfbeeldingen > 0 )
					@foreach($alleBezienswaardigheidMedia as $media)
						@if($media->mediaType == "Afbeelding")
							<div class="geheel">
							<img height="60px" src="{{ asset($media->link)  }}">
							<div class="middle">
							@if($media->isHoofdafbeelding == true)
								<p style="margin-bottom: -3%;">Momenteel ingesteld als hoofdafbeelding</p>
							@else
								<a class="text" href="/admin/bezienswaardigheden/stelHoofdafbeeldingIn/{{ $media->media_id }}" title="Zet als hoofdafbeelding" data-toggle="tooltip"><i class="fa fa-home"></i></a>
							@endif
							<a class="text" href="/admin/bezienswaardigheden/verwijderMedia/{{ $media->media_id }}"><i class="fa fa-trash" title="Verwijderen" data-toggle="tooltip"></i></a>
							</div>
							</div>
						@endif
					@endforeach
				@else
					<p>Deze bezienswaardigheid heeft geen afbeeldingen.</p>
				@endif
				<h4 class="videotitel">360 Foto's</h4>
				@if($erIsEen360Afbeelding)
			     	@foreach($alleBezienswaardigheidMedia as $key => $media)
			     		@if($media->mediaType == "360")
			     		<div class="geheel">
							<a href="/bezienswaardigheden/open360/{{ $media->media_id  }}"><img height="60px" src="{{ asset($media->link)  }}"></a>
							<div class="middle">
							<a class="text" href="/admin/bezienswaardigheden/verwijderMedia/{{ $media->media_id }}"><i class="fa fa-trash" title="Verwijderen" data-toggle="tooltip"></i></a>
						@endif
					@endforeach
				@else
					<p>Deze bezienswaardigheid heeft geen 360 foto.</p>
				@endif
			</div>
		</div>

		<h3 class="nieuwstoevoegen">Extra media toevoegen</h3>
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