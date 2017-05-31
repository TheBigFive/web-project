@extends('layouts.admin')
@section('admincontent')

<div class="gebruikerswrapper">

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
					    <textarea rows="5" name="beschrijving" class="form-control" placeholder="Typ hier de beschrijving van de bezienswaardigheid">{{ $geopendeBezienswaardigheid->beschrijving }}</textarea>
					    @if ($errors->has('beschrijving'))
						    <span class="help-block">
						        <strong>{{ $errors->first('beschrijving') }}</strong>
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
						@endif
					@endforeach
				@else
					<p>Dit bezienswaardigheid heeft geen afbeeldingen.</p>
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
    			</div>
    			<input type="submit" class="btn btn-primary" value="Media Toevoegen">
			</form>	
	</div>
</div>

@endsection