@extends('layouts.admin')

@section('admincontent')

<div class="gebruikerswrapper">

	<h2>School toevoegen</h2>
	
	<form action="/admin/scholen/toevoegen" method="post" enctype="multipart/form-data">
		{!! csrf_field() !!}
		<div class="form-group">
		    <label for="naam">Naam school</label>
		    <input type="text" name="naam" class="form-control" placeholder="Typ hier de naam van de school">
		    @if ($errors->has('naam'))
			    <span class="help-block">
			        <strong>{{ $errors->first('naam') }}</strong>
			    </span>
			@endif
		</div>
		<div class="form-group{{ $errors->has('beschrijving') ? ' has-error' : '' }}">
		    <label for="beschrijving">Beschrijving school</label>
		    <textarea rows="5" name="beschrijving" class="form-control summernote" placeholder="Typ hier een korte beschrijving van de school"></textarea>
		    @if ($errors->has('beschrijving'))
			    <span class="help-block">
			        <strong>{{ $errors->first('beschrijving') }}</strong>
			    </span>
			@endif
		</div>
		<div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
		    <label for="website">Website</label>
		    <input type="text" name="website" class="form-control" placeholder="Typ hier de website van de school">
			@if ($errors->has('website'))
			    <span class="help-block">
				    <strong>{{ $errors->first('website') }}</strong>
			    </span>
			@endif
		</div>

		<h3>Media</h3>
		
		<div class="row">
			<div class="col-md-4">
				<h4>Logo school</h4>
				<div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
					<label for="logo">Voeg het logo van de school toe</label>
					<input type="file" name="logo"/><br/>
					@if ($errors->has('logo'))
					    <span class="help-block">
						    <strong>{{ $errors->first('logo') }}</strong>
					    </span>
					@endif
				</div>
			</div>
			<div class="col-md-4">
				<h4>Afbeelding</h4>
				<div class="form-group{{ $errors->has('afbeelding') ? ' has-error' : '' }}">
					<label for="afbeelding">Voeg een afbeelding van de school toe</label>
					<input type="file" name="afbeelding"/><br/>
					@if ($errors->has('afbeelding'))
					    <span class="help-block">
						    <strong>{{ $errors->first('afbeelding') }}</strong>
					    </span>
					@endif
				</div>
			</div>
			
		</div>
		
		

		<div class="form-group">
		    <input type="submit" class="btn btn-primary" value="Maak artikel">
		</div>
	</form>

</div>

@endsection