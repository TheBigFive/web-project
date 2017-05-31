@extends('layouts.admin')
@section('admincontent')

<div class="gebruikerswrapper">

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
		    <textarea rows="5" name="beschrijving" class="form-control" placeholder="Typ hier de beschrijving van de bezienswaardigheid"></textarea>
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
		    <input type="submit" class="btn btn-primary" value="Maak Bezienswaardigheid">
		</div>
	</form>

</div>

@endsection