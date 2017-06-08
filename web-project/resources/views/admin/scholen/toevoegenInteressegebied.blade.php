@extends('layouts.admin')

@section('admincontent')

<div class="gebruikerswrapper">

	<h2>Interessegebied toevoegen</h2>
	<form id="interessegebiedForm" action="/admin/scholen/interessegebied/toevoegen/{{ $geopendeSchool->school_id }}" enctype="multipart/form-data" method="post">     	
				{!! csrf_field() !!}
				<div class="form-group">
				    <label for="naam">Naam Interessegebied</label>
				    <input type="text" name="naam" class="form-control" placeholder="Typ hier de naam van de interessegebied"></input>
				    @if ($errors->has('naam'))
					    <span class="help-block">
					        <strong>{{ $errors->first('naam') }}</strong>
					    </span>
					@endif
				</div>
				<div class="form-group">
				    <label for="link">Link naar website</label>
				    <input type="text" name="link" class="form-control" placeholder="Typ hier de link naar de website"></input>
				    @if ($errors->has('link'))
					    <span class="help-block">
					        <strong>{{ $errors->first('link') }}</strong>
					    </span>
					@endif
				</div>
				<div class="form-group{{ $errors->has('afbeelding') ? ' has-error' : '' }}">
					<label for="afbeelding">Voeg een afbeelding toe</label>
					<input type="file" name="afbeelding"/><br/>
					@if ($errors->has('afbeelding'))
					    <span class="help-block">
						    <strong>{{ $errors->first('afbeelding') }}</strong>
					    </span>
					@endif
				</div>		
				
				<button type="button" id="interessegebiedAnnulerenKnop" class="btn btn-primary">
					Annuleren
				</button>
				<span>
					<input type="submit" class="btn btn-danger" value="Interessegebied toevoegen">
				</span>	
			</form>
			@if( session()->has('foutmelding'))
		       	@if(!$errors->all())
		        	<div class="alert alert-danger">
				        {{ session()->get('foutmelding') }}
				    </div>
			    @endif
			@endif
			</div>
@endsection