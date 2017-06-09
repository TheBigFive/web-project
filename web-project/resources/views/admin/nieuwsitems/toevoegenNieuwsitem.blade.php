@extends('layouts.admin')
@section('admincontent')

<div class="row heading-bg  bg-blue">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h2 class="txt-light" style="margin-top: 3%; margin-left: 29%; width: 100%;">Nieuwsitem toevoegen</h2>
    </div>
</div>

<div class="gebruikerswrapper">

	
	<form action="/admin/nieuwsitems/toevoegen" method="post" enctype="multipart/form-data">
		{!! csrf_field() !!}
		<div class="form-group">
		    <label for="titel" class="nieuwstoevoegen">Titel nieuwsartikel</label>
		    <input type="text" name="titel" class="form-control" placeholder="Typ hier de titel van het nieuwsartikel">
		    @if ($errors->has('titel'))
			    <span class="help-block">
			        <strong>{{ $errors->first('titel') }}</strong>
			    </span>
			@endif
		</div>
		<div class="form-group">
		    <label for="beschrijving" class="nieuwstoevoegen">Introtekst</label>
		    <textarea rows="5" name="introtekst" class="form-control summernote" placeholder="Typ hier je introtekst"></textarea>
		    @if ($errors->has('introtekst'))
			    <span class="help-block">
			        <strong>{{ $errors->first('introtekst') }}</strong>
			    </span>
			@endif
		</div>
		<div class="form-group">
		    <label for="beschrijving" class="nieuwstoevoegen">Artikel</label>
		    <textarea rows="5" name="artikel" class="form-control summernote" placeholder="Typ hier je artikel"></textarea>
		    @if ($errors->has('artikel'))
			    <span class="help-block">
			        <strong>{{ $errors->first('artikel') }}</strong>
			    </span>
			@endif
		</div>
		<div class="form-group{{ $errors->has('tag') ? ' has-error' : '' }}">
		    <label for="tag" class="nieuwstoevoegen">Tag</label>
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

		<h3 class="nieuwstoevoegen">Media</h3>
		
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
		
		

		<div class="form-group nieuwsknoponderaan">
		    <input type="submit" class="btn btn-primary" value="Maak artikel">
		</div>
	</form>

</div>

@endsection