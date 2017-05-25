@extends('layouts.admin')

@section('admincontent')
<div class="gebruikerswrapper">
    <div class="row">
        <h2>Wijziging gebruiker</h2>      
        	
        		<form action="/admin/gebruikers/wijzig/{{ $geopendeGebruiker->id }}" method="post">
        			@if( session()->has('succesBericht'))
        				@if(!$errors->all())
        					<div class="alert alert-success">
			                    De gegevens van de gebruiker werden succesvol gewijzigd.
			              </div>
	        			@endif
        			@endif        			

	                {!! csrf_field() !!}
	             	<div class="row">
		                <div class="col-md-6">
			                <div class="form-group{{ $errors->has('voornaam') ? ' has-error' : '' }}">
			                    <label for="voornaam">Voornaam</label>
			                    <input type="text" class="form-control" value="{{ $geopendeGebruiker->voornaam }}" name="voornaam" placeholder="Typ hier de voornaam">
			                    @if ($errors->has('voornaam'))
			                      <span class="help-block">
			                        <strong>{{ $errors->first('voornaam') }}</strong>
			                      </span>
			                    @endif
			                </div>
			                <div class="form-group{{ $errors->has('achternaam') ? ' has-error' : '' }}">
			                    <label for="achternaam">Achternaam</label>
			                    <input type="text" class="form-control" value="{{ $geopendeGebruiker->achternaam }}" name="achternaam" placeholder="Typ hier de achternaam">
			                    @if ($errors->has('achternaam'))
			                      <span class="help-block">
			                        <strong>{{ $errors->first('achternaam') }}</strong>
			                      </span>
			                    @endif
			                </div>
			                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
			                    <label for="email">Email-adres</label>
			                    <input type="email" class="form-control" value="{{ $geopendeGebruiker->email }}" name="email" placeholder="Typ hier het emailadres">
			                    @if ($errors->has('email'))
			                      <span class="help-block">
			                        <strong>{{ $errors->first('email') }}</strong>
			                      </span>
			                    @endif
			                </div>

			                <div class="form-group{{ $errors->has('geboortedatum') ? ' has-error' : '' }}">
						        <label>Geboortedatum</label>

						        <input type="date" class="form-control" name="geboortedatum" value="{{ $geopendeGebruiker->geboortedatum }}">

						        @if ($errors->has('geboortedatum'))
						          <span class="help-block">
						            <strong>{{ $errors->first('geboortedatum') }}</strong>
						          </span>
						        @endif

						    </div>
						    <div class="form-group{{ $errors->has('woonplaats') ? ' has-error' : '' }}">
			                    <label for="woonplaats">Woonplaats</label>
			                    <input type="text" class="form-control" value="{{ $geopendeGebruiker->woonplaats }}" name="woonplaats" placeholder="Typ hier je woonplaats">
			                    @if ($errors->has('woonplaats'))
			                      <span class="help-block">
			                        <strong>{{ $errors->first('woonplaats') }}</strong>
			                      </span>
			                    @endif
			                </div>
			                <div class="form-group{{ $errors->has('geslacht') ? ' has-error' : '' }}">
			                    <label for="geslacht">Geslacht</label><br>
			                    @if ($geopendeGebruiker->geslacht == "Man")
			                    	<label class="radio-inline"><input checked type="radio" name="geslacht" value="Man">Man</label>
			                    	<label class="radio-inline"><input type="radio" name="geslacht" value="Vrouw">Vrouw</label>
			                    @elseif ($geopendeGebruiker->geslacht == "Vrouw")
			                    	<label class="radio-inline"><input type="radio" name="geslacht" value="Man">Man</label>
									<label class="radio-inline"><input  checked type="radio" name="geslacht" value="Vrouw">Vrouw</label>
								@else
									<label class="radio-inline"><input type="radio" name="geslacht" value="Man">Man</label>
									<label class="radio-inline"><input type="radio" name="geslacht" value="Vrouw">Vrouw</label>

								@endif
			                    @if ($errors->has('geslacht'))
			                      <span class="help-block">
			                        <strong>{{ $errors->first('geslacht') }}</strong>
			                      </span>
			                    @endif
			                </div>
			                <div class="form-group{{ $errors->has('op_kot') ? ' has-error' : '' }}">
			                    <label for="op_kot">Zit je op kot?</label><br>
			                    @if ($geopendeGebruiker->op_kot)
			                    	<label class="radio-inline"><input checked type="radio" name="op_kot" value="1">Ja</label>
			                    	<label class="radio-inline"><input type="radio" name="op_kot" value="0">Nee</label>
								@elseif (!$geopendeGebruiker->op_kot)
			                    	<label class="radio-inline"><input type="radio" name="op_kot" value="1">Ja</label>
									<label class="radio-inline"><input checked type="radio" name="op_kot" value="0">Nee</label>
								@else
			                    	<label class="radio-inline"><input type="radio" name="op_kot" value="1">Ja</label>
									<label class="radio-inline"><input type="radio" name="op_kot" value="0">Nee</label>
									
								@endif

			                    @if ($errors->has('op_kot'))
			                      <span class="help-block">
			                        <strong>{{ $errors->first('op_kot') }}</strong>
			                      </span>
			                    @endif
			                </div>

			                <div class="form-group{{ $errors->has('studentenclub') ? ' has-error' : '' }}">
			                    <label for="studentenclub">Studentenclub</label>
			                    <input type="text" class="form-control" value="{{ $geopendeGebruiker->studentenclub }}" name="studentenclub" placeholder="Laat dit veld leeg indien je er geen hebt">
			                    @if ($errors->has('studentenclub'))
			                      <span class="help-block">
			                        <strong>{{ $errors->first('studentenclub') }}</strong>
			                      </span>
			                    @endif
			                </div>
			                
			                
						</div>
		                <div class="col-md-3">
		                	<div class="form-group{{ $errors->has('rol') ? ' has-error' : '' }}">
			                    <label for="rol">Rol</label>
			                    <select class="form-control" name="rol">
			                    	@foreach ($alleRollen as $rol)
			                    		@if ($geopendeGebruiker->rol_id == $rol->rol_id)
			                    			<option selected value="{{ $rol->rol_id }}">{{ $rol->naam }}</option>
			                    		@else
			                    			<option value="{{ $rol->rol_id }}">{{ $rol->naam }}</option>
			                    		@endif
			                    	@endforeach
			                    </select>
			                    @if ($errors->has('rol'))
			                      <span class="help-block">
			                        <strong>{{ $errors->first('rol') }}</strong>
			                      </span>
			                    @endif
			                </div>
		                </div>
	            	</div>
	                <div class="row">
	                	<span>
		                	<a href="/admin/gebruikers/verwijder/{{ $geopendeGebruiker->id }}" class="btn btn-danger">Gebruiker verwijderen</a>
		             	</span>	

	                	<span>
		                	<input type="submit" name="wijzigen" class="btn btn-primary" value="Gebruiker wijzigen">
		              	</span>
		                
	                </div>               
	                
	              	
	            </form>
            
        	
        
			
		
		
    </div>
</div>
@endsection
