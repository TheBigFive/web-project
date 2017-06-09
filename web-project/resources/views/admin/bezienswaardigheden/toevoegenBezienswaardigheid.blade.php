@extends('layouts.admin')
@section('admincontent')

<div class="row heading-bg  bg-blue">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h2 class="txt-light" style="margin-top: 3%; margin-left: 29%; width: 200%;">Bezienswaardigheid toevoegen</h2>
    </div>
</div>

<div class="gebruikerswrapper bevatNieuweBezienswaardigheidMap">

	<form action="/admin/bezienswaardigheden/toevoegen" enctype="multipart/form-data" method="post">
		{!! csrf_field() !!}
		<div class="form-group">
		    <label for="naam" class="nieuwstoevoegen">Naam bezienswaardigheid</label>
		    <input type="text" name="naam" class="form-control" placeholder="Typ hier de naam van de bezienswaardigheid">
		    @if ($errors->has('naam'))
			    <span class="help-block">
			        <strong>{{ $errors->first('naam') }}</strong>
			    </span>
			@endif
		</div>
		<div class="form-group">
		    <label for="beschrijving" class="nieuwstoevoegen">Beschrijving</label>
		    <textarea rows="5" name="beschrijving" class="form-control summernote" placeholder="Typ hier de beschrijving van de bezienswaardigheid"></textarea>
		    @if ($errors->has('beschrijving'))
			    <span class="help-block">
			        <strong>{{ $errors->first('beschrijving') }}</strong>
			    </span>
			@endif
		</div>

		<div class="form-group">
		    <label for="adres" class="nieuwstoevoegen">Locatie</label>
		    <p>Geef het volledige adres in van de bezienswaardigheid</p>
		    <input type="text" name="locatie-text" id="locatie-text" placeholder="vb. Grote Markt 1, 2000 Antwerpen" class="form-control zoeklocatieveld"/>
		    <button id="locatieBezienswaardigheidKnop" class="btn btn-primary">Zoek locatie op</button>
		    <div id="voegBezienswaardigheidToe-map" style="margin-top: 2%;"></div>
		    <input id="locatie-input" type="hidden" name="coordinaten">
		</div>

		<div class="form-group">
		    <label for="openingsuren" class="nieuwstoevoegen">Openingsuren</label>
		    <textarea rows="5" name="openingsuren" class="form-control summernote" placeholder="Typ hier de openingsuren van de bezienswaardigheid"></textarea>
		    @if ($errors->has('openingsuren'))
			    <span class="help-block">
			        <strong>{{ $errors->first('openingsuren') }}</strong>
			    </span>
			@endif
		</div>

		<div class="form-group">
		    <label for="vervoer" class="nieuwstoevoegen">Vervoer</label>
		    <textarea rows="5" name="vervoer" class="form-control summernote" placeholder="Typ hier de vervoersmogelijkheden van de bezienswaardigheid"></textarea>
		    @if ($errors->has('vervoer'))
			    <span class="help-block">
			        <strong>{{ $errors->first('vervoer') }}</strong>
			    </span>
			@endif
		</div>
		<div class="form-group">
		    <label for="kostprijs" class="nieuwstoevoegen">Kostprijs</label>
		    <textarea rows="5" name="kostprijs" class="form-control summernote" placeholder="Typ hier de kostprijzen van de bezienswaardigheid"></textarea>
		    @if ($errors->has('kostprijs'))
			    <span class="help-block">
			        <strong>{{ $errors->first('kostprijs') }}</strong>
			    </span>
			@endif
		</div>
		
		<div class="form-group">
		    <label for="contact" class="nieuwstoevoegen">Contact</label>
		    <textarea rows="5" name="contact" class="form-control summernote" placeholder="Typ hier de contactmogelijkheden van de bezienswaardigheid"></textarea>
		    @if ($errors->has('contact'))
			    <span class="help-block">
			        <strong>{{ $errors->first('contact') }}</strong>
			    </span>
			@endif
		</div>

		

		<h3 class="nieuwstoevoegen">Media</h3>
		
		<div class="row">
			<div class="col-md-5">
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
			</div>
			<div class="col-md-5">
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
			</div>
			
		</div>

		<div class="form-group">
		    <input type="submit" class="btn btn-primary nieuwsknoponderaan" value="Maak Bezienswaardigheid">
		</div>
	</form>

</div>


@endsection