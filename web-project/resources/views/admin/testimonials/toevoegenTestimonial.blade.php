@extends('layouts.admin')

@section('admincontent')

<div class="gebruikerswrapper">

	<h2>Testimonial toevoegen</h2>
	
	<form action="/admin/testimonials/toevoegen" enctype="multipart/form-data" method="post">
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
		    <input type="text" name="naam_persoon" class="form-control" placeholder="Typ hier de naam van de persoon die het verhaal vertelt">
		    @if ($errors->has('naam_persoon'))
			    <span class="help-block">
			        <strong>{{ $errors->first('naam_persoon') }}</strong>
			    </span>
			@endif
		</div>
		<div class="form-group">
		    <label for="leeftijd_persoon">Leeftijd persoon</label>
		    <input type="number" name="leeftijd_persoon" class="form-control" placeholder="Typ hier de leeftijd van de persoon die het verhaal vertelt">
		    @if ($errors->has('leeftijd_persoon'))
			    <span class="help-block">
			        <strong>{{ $errors->first('leeftijd_persoon') }}</strong>
			    </span>
			@endif
		</div>
		<div class="form-group">
		    <label for="functie_persoon">Functie persoon</label>
		    <input type="text" name="functie_persoon" class="form-control" placeholder="Typ hier de functie van de persoon die het verhaal vertelt: vb. Student Marketing">
		    @if ($errors->has('functie_persoon'))
			    <span class="help-block">
			        <strong>{{ $errors->first('functie_persoon') }}</strong>
			    </span>
			@endif
		</div>
		<div class="form-group">
		    <label for="beschrijving_persoon">Beschrijving persoon</label>
		    <textarea rows="5" name="beschrijving_persoon" class="form-control summernote" placeholder="Typ hier de beschrijving van de persoon"></textarea>
		    @if ($errors->has('beschrijving_persoon'))
			    <span class="help-block">
			        <strong>{{ $errors->first('beschrijving_persoon') }}</strong>
			    </span>
			@endif
		</div>
		<div class="form-group">
		    <label for="tekstvorm_testimonial">Artikel</label>
		    <textarea rows="5" name="tekstvorm_testimonial" class="form-control summernote" placeholder="Typ hier je artikel"></textarea>
		    @if ($errors->has('teskstvorm_testimonial'))
			    <span class="help-block">
			        <strong>{{ $errors->first('teskstvorm_testimonial') }}</strong>
			    </span>
			@endif
		</div>

		<div class="form-group{{ $errors->has('tag') ? ' has-error' : '' }}">
		    <label for="tag">Tag</label>
		    <select class="form-control" name="tag">
		    @foreach ($alleTags as $tag)
			   		<option value="{{ $tag->tag_id }}">{{ $tag->naam }}</option>
			@endforeach
			</select>
			@if ($errors->has('tag'))
			    <span class="help-block">
				    <strong>{{ $errors->first('tag') }}</strong>
			    </span>
			@endif
		</div>

		<h3>Media</h3>
		
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
				<h4>Video</h4>
				<div class="form-group{{ $errors->has('video') ? ' has-error' : '' }}">
					<label for="afbeeldingen">Voeg een youtube videolink toe</label>
					<input type="text" name="video" class="form-control" placeholder="Kopieer en plak hier de youtubelink"/>
					@if ($errors->has('video'))
					    <span class="help-block">
						    <strong>{{ $errors->first('video') }}</strong>
					    </span>
					@endif
					@if( session()->has('foutmelding'))
						<div class="alert alert-danger">
						    {{ session()->get('foutmelding') }}
						</div>
							    
					@endif
				</div>				
			</div>
			
		</div>
		
		<div class="form-group">
		    <input type="submit" class="btn btn-primary" value="Maak testimonial">
		</div>
	</form>

</div>

@endsection