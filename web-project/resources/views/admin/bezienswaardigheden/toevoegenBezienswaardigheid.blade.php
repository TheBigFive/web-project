@extends('layouts.admin')
@section('admincontent')

<div class="gebruikerswrapper bevatNieuweBezienswaardigheidMap">

	<h2>Bezienswaardigheden Toevoegen</h2>
	<form action="/admin/bezienswaardigheden/toevoegen" enctype="multipart/form-data" method="post">
		{!! csrf_field() !!}
		<div class="form-group">
		    <label for="naam">Naam bezienswaardigheid</label>
		    <input type="text" name="naam" class="form-control" placeholder="Typ hier de naam van de bezienswaardigheid">
		    @if ($errors->has('naam'))
			    <span class="help-block">
			        <strong>{{ $errors->first('naam') }}</strong>
			    </span>
			@endif
		</div>
		<div class="form-group">
		    <label for="beschrijving">Beschrijving</label>
		    <textarea rows="5" name="beschrijving" class="form-control summernote" placeholder="Typ hier de beschrijving van de bezienswaardigheid"></textarea>
		    @if ($errors->has('beschrijving'))
			    <span class="help-block">
			        <strong>{{ $errors->first('beschrijving') }}</strong>
			    </span>
			@endif
		</div>

		<h4>Afbeeldingen</h4>
		<div class="form-group{{ $errors->has('afbeeldingen') ? ' has-error' : '' }}">
			<label for="afbeeldingen">Voeg één of meerdere afbeeldingen toe</label>
			<input type="file" name="afbeeldingen[]" multiple="true" /><br/>
			@if ($errors->has('afbeeldingen'))
			    <span class="help-block">
				    <strong>{{ $errors->first('afbeeldingen') }}</strong>
			    </span>
			@endif
		</div>

		<div class="form-group">
		    <label for="openingsuren">Openingsuren</label>
		    <textarea rows="5" name="openingsuren" class="form-control summernote" placeholder="Typ hier de openingsuren van de bezienswaardigheid"></textarea>
		    @if ($errors->has('openingsuren'))
			    <span class="help-block">
			        <strong>{{ $errors->first('openingsuren') }}</strong>
			    </span>
			@endif
		</div>

		<div class="form-group">
		    <label for="vervoer">Vervoer</label>
		    <textarea rows="5" name="vervoer" class="form-control summernote" placeholder="Typ hier de vervoersmogelijkheden van de bezienswaardigheid"></textarea>
		    @if ($errors->has('vervoer'))
			    <span class="help-block">
			        <strong>{{ $errors->first('vervoer') }}</strong>
			    </span>
			@endif
		</div>
		<div class="form-group">
		    <label for="kostprijs">Kostprijs</label>
		    <textarea rows="5" name="kostprijs" class="form-control summernote" placeholder="Typ hier de kostprijzen van de bezienswaardigheid"></textarea>
		    @if ($errors->has('kostprijs'))
			    <span class="help-block">
			        <strong>{{ $errors->first('kostprijs') }}</strong>
			    </span>
			@endif
		</div>
		<div class="form-group">
		    <label for="adres">Locatie</label>
		    <p>Geef het volledige adres in van de bezienswaardigheid</p>
		    <input type="text" name="locatie-text" id="locatie-text" placeholder="vb. Grote Markt 1, 2000 Antwerpen" class="form-control"/><br/>
		    <button id="locatieBezienswaardigheidKnop" class="btn btn-primary">Zoek locatie op</button>
		    <div id="voegBezienswaardigheidToe-map"></div>
		    <input id="locatie-input" type="hidden" name="coordinaten">
		</div>
		
		<div class="form-group">
		    <label for="contact">Contact</label>
		    <textarea rows="5" name="contact" class="form-control summernote" placeholder="Typ hier de contactmogelijkheden van de bezienswaardigheid"></textarea>
		    @if ($errors->has('contact'))
			    <span class="help-block">
			        <strong>{{ $errors->first('contact') }}</strong>
			    </span>
			@endif
		</div>

		<div class="form-group">
		    <input type="submit" class="btn btn-primary" value="Maak Bezienswaardigheid">
		</div>
	</form>

</div>


@endsection