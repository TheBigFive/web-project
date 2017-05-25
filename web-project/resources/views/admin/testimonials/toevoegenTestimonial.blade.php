@extends('layouts.admin')

@section('admincontent')

<div class="gebruikerswrapper">

	<h2>Testimonial toevoegen</h2>
	
	<form action="/admin/testimonials/toevoegen" method="post">
		{!! csrf_field() !!}
		<div class="form-group">
		    <label for="titel">Titel testimonial</label>
		    <input type="text" name="titel" class="form-control" placeholder="Typ hier de titel van de testimonial">
		    @if ($errors->has('titel'))
			    <span class="help-block">
			        <strong>{{ $errors->first('titel') }}</strong>
			    </span>
			@endif
		</div>
		<div class="form-group">
		    <label for="naam_persoon">Naam persoon</label>
		    <input type="text" name="naam_persoon" class="form-control" placeholder="Typ hier de naam van de persoon">
		    @if ($errors->has('naam_persoon'))
			    <span class="help-block">
			        <strong>{{ $errors->first('naam_persoon') }}</strong>
			    </span>
			@endif
		</div>
		<div class="form-group">
		    <label for="beschrijving_persoon">Beschrijving persoon</label>
		    <textarea rows="5" name="beschrijving_persoon" class="form-control" placeholder="Typ hier de beschrijving van de persoon"></textarea>
		    @if ($errors->has('beschrijving_persoon'))
			    <span class="help-block">
			        <strong>{{ $errors->first('beschrijving_persoon') }}</strong>
			    </span>
			@endif
		</div>
		<div class="form-group">
		    <label for="beschrijving_testimonial">Beschrijving artikel</label>
		    <textarea rows="5" name="beschrijving_testimonial" class="form-control" placeholder="Typ de beschrijving van het artikel"></textarea>
		    @if ($errors->has('beschrijving_testimonial'))
			    <span class="help-block">
			        <strong>{{ $errors->first('beschrijving_testimonial') }}</strong>
			    </span>
			@endif
		</div>

		<div class="form-group">
		    <label for="afbeelding">Afbeelding</label>
		    <input type="text" name="afbeelding" class="form-control" placeholder="Geef hier de url naar je afbeelding">
		    @if ($errors->has('afbeelding'))
			    <span class="help-block">
			        <strong>{{ $errors->first('afbeelding') }}</strong>
			    </span>
			@endif
		</div>
		<div class="form-group">
		    <label for="videolink">Video</label>
		    <input type="text" name="videolink" class="form-control" placeholder="Geef hier de url naar je video">
		    @if ($errors->has('videolink'))
			    <span class="help-block">
			        <strong>{{ $errors->first('videolink') }}</strong>
			    </span>
			@endif
		</div>

		  <div class="form-group">
		    <label for="tekstvorm_testimonial">Artikel</label>
		    <textarea rows="5" name="tekstvorm_testimonial" class="form-control" placeholder="Typ hier je artikel"></textarea>
		    @if ($errors->has('teskstvorm_testimonial'))
			    <span class="help-block">
			        <strong>{{ $errors->first('teskstvorm_testimonial') }}</strong>
			    </span>
			@endif
		  </div>
		  <div class="form-group">
		    <input type="submit" class="btn btn-primary" value="Maak testimonial">
		  </div>
	</form>

</div>

@endsection