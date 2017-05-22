@extends('layouts.admin')

@section('admincontent')
	<h2>Nieuwsartikel wijzigen</h2>
	
	<form class="project-form" action="/admin/nieuwsitems/wijzig/{{ $geopendeNieuwsitem->nieuwsitem_id }}" method="post">
		@if( session()->has('succesBericht'))
        				@if(!$errors->all())
        					<div class="alert alert-success">
			                    Het nieuwsartikel werd succesvol gewijzigd.
			              </div>
	        			@endif
        			@endif        	
	 	{!! csrf_field() !!}
		<div class="form-group">
		    <label for="titel">Titel nieuwsartikel</label>
		    <input type="text" name="titel" class="form-control" value="{{ $geopendeNieuwsitem->titel }}" placeholder="Typ hier de titel van het nieuwsartikel">
		    @if ($errors->has('titel'))
			    <span class="help-block">
			        <strong>{{ $errors->first('titel') }}</strong>
			    </span>
			@endif
		</div>
		<div class="form-group">
		    <label for="introtekst">Introtekst</label>
		    <textarea rows="5" name="introtekst" class="form-control" placeholder="Typ hier je introtekst">{{ $geopendeNieuwsitem->introtekst }}</textarea>
		    @if ($errors->has('introtekst'))
			    <span class="help-block">
			        <strong>{{ $errors->first('introtekst') }}</strong>
			    </span>
			@endif
		</div>
		  <div class="form-group">
		    <label for="beschrijving">Artikel</label>
		    <textarea rows="5" name="artikel" class="form-control" placeholder="Typ hier je artikel">{{ $geopendeNieuwsitem->artikel }}</textarea>
		    @if ($errors->has('artikel'))
			    <span class="help-block">
			        <strong>{{ $errors->first('artikel') }}</strong>
			    </span>
			@endif
		  </div>
		  <div class="form-group">
		    <input type="submit" class="btn btn-primary" value="Wijzig artikel">
		 </div>
	</form>

@endsection