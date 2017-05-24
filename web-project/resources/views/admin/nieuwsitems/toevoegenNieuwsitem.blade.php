@extends('layouts.admin')

@section('admincontent')
	<h2>Nieuwsartikel toevoegen</h2>
	
	<form action="/admin/nieuwsitems/toevoegen" method="post">
		{!! csrf_field() !!}
		<div class="form-group">
		    <label for="titel">Titel nieuwsartikel</label>
		    <input type="text" name="titel" class="form-control" placeholder="Typ hier de titel van het nieuwsartikel">
		    @if ($errors->has('titel'))
			    <span class="help-block">
			        <strong>{{ $errors->first('titel') }}</strong>
			    </span>
			@endif
		</div>
		<div class="form-group">
		    <label for="beschrijving">Introtekst</label>
		    <textarea rows="5" name="introtekst" class="form-control" placeholder="Typ hier je introtekst"></textarea>
		    @if ($errors->has('introtekst'))
			    <span class="help-block">
			        <strong>{{ $errors->first('introtekst') }}</strong>
			    </span>
			@endif
		</div>
		<div class="form-group">
		    <label for="beschrijving">Artikel</label>
		    <textarea rows="5" name="artikel" class="form-control" placeholder="Typ hier je artikel"></textarea>
		    @if ($errors->has('artikel'))
			    <span class="help-block">
			        <strong>{{ $errors->first('artikel') }}</strong>
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

		<div class="form-group">
		    <input type="submit" class="btn btn-primary" value="Maak artikel">
		</div>
	</form>

@endsection