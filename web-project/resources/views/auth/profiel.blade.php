@extends('layouts.app')

@section('content')
	<div class="container">
    
      	<div class="row">
	          <h1>Profielpagina: <span class="red">{{ Auth::user()->voornaam }} {{ Auth::user()->achternaam }}</span></h1>
      	</div>
      	<div class="row">                  
            
            <div class="spacer"></div>
            <div class="col-md-7"> 
            	<h2>Uw gegevens</h2>
	            <form action="/profiel/wijzigen" method="post">
	            	@if( session()->has('succesBericht'))
        				@if(!$errors->all())
        					<div class="alert alert-success">
			                    Je gegevens werden succesvol gewijzigd.
			              </div>
	        			@endif
        			@endif        	


	                {!! csrf_field() !!}
	                <div class="form-group{{ $errors->has('voornaam') ? ' has-error' : '' }}">
	                    <label for="voornaam">Voornaam*</label>
	                    <input type="text" class="form-control" value="{{ Auth::user()->voornaam }}" name="voornaam" placeholder="Typ hier uw voornaam">
	                    @if ($errors->has('voornaam'))
	                      <span class="help-block">
	                        <strong>{{ $errors->first('voornaam') }}</strong>
	                      </span>
	                    @endif
	                </div>
	                <div class="form-group{{ $errors->has('achternaam') ? ' has-error' : '' }}">
	                    <label for="achternaam">Achternaam*</label>
	                    <input type="text" class="form-control" value="{{ Auth::user()->achternaam }}" name="achternaam" placeholder="Typ hier uw achternaam">
	                    @if ($errors->has('achternaam'))
	                      <span class="help-block">
	                        <strong>{{ $errors->first('achternaam') }}</strong>
	                      </span>
	                    @endif
	                </div>
	                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	                    <label for="email">Email-adres*</label>
	                    <input type="email" class="form-control" value="{{ Auth::user()->email }}" name="email" placeholder="Typ hier uw emailadres">
	                    @if ($errors->has('email'))
	                      <span class="help-block">
	                        <strong>{{ $errors->first('email') }}</strong>
	                      </span>
	                    @endif
	                </div>

	                <div class="form-group{{ $errors->has('geboortedatum') ? ' has-error' : '' }}">
						<label>Geboortedatum*</label>

						<input type="date" class="form-control" name="geboortedatum" value="{{ Auth::user()->geboortedatum }}">

						@if ($errors->has('geboortedatum'))
						    <span class="help-block">
							    <strong>{{ $errors->first('geboortedatum') }}</strong>
						    </span>
						@endif

						    </div>
						    <div class="form-group{{ $errors->has('woonplaats') ? ' has-error' : '' }}">
			                    <label for="woonplaats">Woonplaats</label>
			                    <input type="text" class="form-control" value="{{ Auth::user()->woonplaats }}" name="woonplaats" placeholder="Typ hier je woonplaats">
			                    @if ($errors->has('woonplaats'))
			                      <span class="help-block">
			                        <strong>{{ $errors->first('woonplaats') }}</strong>
			                      </span>
			                    @endif
			                </div>
			                <div class="form-group{{ $errors->has('geslacht') ? ' has-error' : '' }}">
			                    <label for="geslacht">Geslacht</label><br>
			                    @if ( Auth::user()->geslacht == "Man")
			                    	<label class="radio-inline"><input checked type="radio" name="geslacht" value="Man">Man</label>
			                    	<label class="radio-inline"><input type="radio" name="geslacht" value="Vrouw">Vrouw</label>
			                    @elseif (Auth::user()->geslacht == "Vrouw")
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
			                    @if (Auth::user()->op_kot)
			                    	<label class="radio-inline"><input checked type="radio" name="op_kot" value="1">Ja</label>
			                    	<label class="radio-inline"><input type="radio" name="op_kot" value="0">Nee</label>
								@elseif (!Auth::user()->op_kot)
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
			                    <input type="text" class="form-control" value="{{ Auth::user()->studentenclub }}" name="studentenclub" placeholder="Laat dit veld leeg indien je er geen hebt">
			                    @if ($errors->has('studentenclub'))
			                      <span class="help-block">
			                        <strong>{{ $errors->first('studentenclub') }}</strong>
			                      </span>
			                    @endif
			                </div>
			    	<span>
	                	<a href="/profiel/delete" class="btn btn-danger">Account verwijderen</a>
	              	</span>	                
	              	<span>
	                	<input type="submit" name="wijzigen" class="btn btn-primary" value="Profiel wijzigen">
	              	</span>
	                
	            </form>
        	</div>

        	<div class="col-md-5"> 
        		<h2>Nieuw wachtwoord instellen</h2>
	            <form action="/profiel/wachtwoordwijzigen" method="post">

	            	@if( session()->has('succesWachtwoordBericht'))
        				@if(!$errors->all())
        					<div class="alert alert-success">
			                    Je wachtwoord werd succesvol gewijzigd.
			              </div>
	        			@endif
        			@endif       

	                {!! csrf_field() !!}
	               
	                <div class="form-group">
	                    <label for="nieuwWachtwoord">Nieuw wachtwoord</label>
	                    <input type="password" class="form-control" value="" name="password" placeholder="Typ hier uw nieuw wachtwoord">
	                    @if ($errors->has('password'))
				          <span class="help-block">
				            <strong>{{ $errors->first('password') }}</strong>
				          </span>
				        @endif	                    
	                </div>

	                <div class="form-group">
	                    <label for="nieuwWachtwoord">Herhaal nieuw wachtwoord</label>
	                    <input type="password" class="form-control" value="" name="password_confirmation" placeholder="Typ hier uw nieuw wachtwoord nogmaals">
	                    @if ($errors->has('password_confirmation'))
				          <span class="help-block">
				            <strong>{{ $errors->first('password_confirmation') }}</strong>
				          </span>
				        @endif
	                </div>
	                
	           
	              <span>
	                <input type="submit" name="wijzigen" class="btn btn-primary" value="Wachtwoord wijzigen">
	              </span>
	                
	            </form>
        	</div>
        </div>
    </div>
@endsection