@extends('layouts.admin')

@section('admincontent')

	<div class="gebruikerswrapper bevatNieuweCampusMap">

		<h2>Campus toevoegen</h2>
		<form id="campusForm" action="/admin/scholen/campus/toevoegen/{{ $geopendeSchool->school_id }}" method="post">     	
				{!! csrf_field() !!}
				<div class="form-group">
				    <label for="campus">Naam campus</label>
				    <input type="text" name="campus" class="form-control" placeholder="Typ hier de naam van de campus"></input>
				    @if ($errors->has('campus'))
					    <span class="help-block">
					        <strong>{{ $errors->first('campus') }}</strong>
					    </span>
					@endif
				</div>
				<div class="form-group">
				    <label for="adres">Locatie</label>
				    <p>Geef het volledige adres in van de bezienswaardigheid</p>
				    <input type="text" name="locatie-text" id="locatie-text" placeholder="vb. Grote Markt 1, 2000 Antwerpen" class="form-control"/><br/>
				    <button id="locatieSchoolKnop" class="btn btn-primary">Zoek locatie op</button>
				    <div id="voegSchoolToe-map"></div>
				    <input id="locatie-input" type="hidden" name="coordinaten">
				</div>
				<button type="button" id="campusAnnulerenKnop" class="btn btn-primary">
					Annuleren
				</button>
				<span>
					<input type="submit" class="btn btn-danger" value="Campus toevoegen">
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