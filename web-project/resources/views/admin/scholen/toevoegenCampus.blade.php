@extends('layouts.admin')
@section('admincontent')

<div class="row heading-bg  bg-blue">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h2 class="txt-light" style="margin-top: 3%; margin-left: 29%; width: 100%;">Campus toevoegen</h2>
    </div>
</div>

	<div class="gebruikerswrapper bevatNieuweCampusMap">

		<form id="campusForm" action="/admin/scholen/campus/toevoegen/{{ $geopendeSchool->school_id }}" method="post">     	
				{!! csrf_field() !!}
				<div class="form-group">
				    <label for="campus" class="nieuwstoevoegen">Naam campus</label>
				    <input type="text" name="campus" class="form-control" placeholder="Typ hier de naam van de campus"></input>
				    @if ($errors->has('campus'))
					    <span class="help-block">
					        <strong>{{ $errors->first('campus') }}</strong>
					    </span>
					@endif
				</div>
				<div class="form-group">
				    <label for="adres" class="nieuwstoevoegen">Locatie</label>
				    <p>Geef het volledige adres in van de campus</p>
				    <input type="text" name="locatie-text" id="locatie-text" placeholder="vb. Grote Markt 1, 2000 Antwerpen" class="form-control zoeklocatieveld"/>
				    <button id="locatieSchoolKnop" class="btn btn-primary">Zoek locatie op</button>
				    <div id="voegSchoolToe-map" style="margin-top: 2%;"></div>
				    <input id="locatie-input" type="hidden" name="coordinaten">
				</div>
				<div class="knoponderaan">
				<span>
					<input type="submit" class="btn btn-primary" value="Campus toevoegen">
				</span>	
				<button type="button" id="campusAnnulerenKnop" class="btn btn-danger">
					Annuleren
				</button>
				</div>
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