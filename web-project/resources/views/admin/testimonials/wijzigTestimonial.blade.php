@extends('layouts.admin')

@section('admincontent')

<div class="gebruikerswrapper">

	<h2>Testimonial wijzigen</h2>
	
	<form action="/admin/testimonials/wijzig/{{ $geopendeTestimonial->testimonial_id }}" method="post">
		@if( session()->has('succesBericht'))
        				@if(!$errors->all())
        					<div class="alert alert-success">
			                    De testimonial werd succesvol gewijzigd.
			              </div>
	        			@endif
        			@endif        	
	 	{!! csrf_field() !!}
		<div class="form-group">
		    <label for="titel">Titel testimonial</label>
		    <input type="text" name="titel" class="form-control" value="{{ $geopendeTestimonial->titel }}" placeholder="Typ hier de titel van de testimonial">
		    @if ($errors->has('titel'))
			    <span class="help-block">
			        <strong>{{ $errors->first('titel') }}</strong>
			    </span>
			@endif
		</div>
		<div class="form-group">
		    <label for="naam_persoon">Naam persoon</label>
		    <input type="text" name="naam_persoon" class="form-control" value="{{ $geopendeTestimonial->naam_persoon }}" placeholder="Typ hier de naam van de persoon">
		    @if ($errors->has('naam_persoon'))
			    <span class="help-block">
			        <strong>{{ $errors->first('naam_persoon') }}</strong>
			    </span>
			@endif
		</div>
		<div class="form-group">
		    <label for="beschrijving_persoon">Beschrijving persoon</label>
		    <input type="text" name="beschrijving_persoon" class="form-control" value="{{ $geopendeTestimonial->beschrijving_persoon }}" placeholder="Typ hier de beschrijving van de persoon">
		    @if ($errors->has('beschrijving_persoon'))
			    <span class="help-block">
			        <strong>{{ $errors->first('beschrijving_persoon') }}</strong>
			    </span>
			@endif
		</div>
		<div class="form-group">
		    <label for="beschrijving_testimonial">Beschrijving artikel</label>
		    <textarea rows="5" name="beschrijving_testimonial" class="form-control" placeholder="Typ hier je introtekst">{{ $geopendeTestimonial->beschrijving_testimonial }}</textarea>
		    @if ($errors->has('beschrijving_testimonial'))
			    <span class="help-block">
			        <strong>{{ $errors->first('beschrijving_testimonial') }}</strong>
			    </span>
			@endif
		</div>

		<div class="form-group">
		    <label for="afbeelding">Afbeelding</label>
		    <textarea rows="5" name="afbeelding" class="form-control" placeholder="Geef hier de url naar je afbeelding">{{ $geopendeTestimonial->afbeelding }}</textarea>
		    @if ($errors->has('afbeelding'))
			    <span class="help-block">
			        <strong>{{ $errors->first('afbeelding') }}</strong>
			    </span>
			@endif
		</div>
		<div class="form-group">
		    <label for="videolink">Video</label>
		    <textarea rows="5" name="videolink" class="form-control" placeholder="Geef hier de url naar je video">{{ $geopendeTestimonial->videolink }}</textarea>
		    @if ($errors->has('videolink'))
			    <span class="help-block">
			        <strong>{{ $errors->first('videolink') }}</strong>
			    </span>
			@endif
		</div>

		  <div class="form-group">
		    <label for="tekstvorm_testimonial">Artikel</label>
		    <textarea rows="5" name="tekstvorm_testimonial" class="form-control" placeholder="Typ hier je artikel">{{ $geopendeTestimonial->tekstvorm_testimonial }}</textarea>
		    @if ($errors->has('teskstvorm_testimonial'))
			    <span class="help-block">
			        <strong>{{ $errors->first('teskstvorm_testimonial') }}</strong>
			    </span>
			@endif
		  </div>
		  <div class="row">
		  		@if (Auth::user()->rol_id!=4)
				  	<span>
				        <a href="/admin/testimonials/verwijder/{{ $geopendeTestimonial->testimonial_id }}" class="btn btn-danger">Testimonial verwijderen</a>
				   	</span>
			   	@endif

				<span><input type="submit" class="btn btn-primary" value="Wijzig artikel"></span>
			
		 	</div>
	</form>

</div>

@endsection