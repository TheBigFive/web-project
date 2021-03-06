@extends('layouts.admin')

@section('admincontent')
	<h2>Nieuwsartikel: {{ $geopendeNieuwsitem->titel }}</h2>

	@if( session()->has('succesBericht'))
        	@if(!$errors->all())
        	<div class="alert alert-success">
		        {{ session()->get('succesBericht') }}
		    </div>
	    @endif
    @endif
	
	<p>Introtekst: {{ $geopendeNieuwsitem->introtekst }}</p>
	<p>Artikel: {{ $geopendeNieuwsitem->artikel }}</p>
	<p>Goedkeuringsstatus: {{ $geopendeNieuwsitem->goedkeuringsstatus }}</p>
	<p>Publicatiestatus: {{ $geopendeNieuwsitem->publicatieStatus }}</p>

	@if ($geopendeNieuwsitem->redenVanAfwijzing)
		<p>Reden van afwijzing: {{ $geopendeNieuwsitem->redenVanAfwijzing }}</p>
	@endif

	@if (Auth::user()->rol_id!=4)
		@if($geopendeNieuwsitem->goedkeuringsstatus != "Afgewezen")
			<form action="/admin/nieuwsitems/afwijzen/{{ $geopendeNieuwsitem->nieuwsitem_id }}" method="post">     	
			 	{!! csrf_field() !!}
				<div class="form-group">
				    <label for="titel">Reden van afwijzing</label>
				    <textarea rows="5" name="redenVanAfwijzing" class="form-control" placeholder="Typ hier de reden van Afwijzing"></textarea>
				    @if ($errors->has('redenVanAfwijzing'))
					    <span class="help-block">
					        <strong>{{ $errors->first('redenVanAfwijzing') }}</strong>
					    </span>
					@endif
				</div>
				<span>
					<input type="submit" class="btn btn-danger" value="Artikel afwijzen">
				</span>	
			</form>
		@endif

		@if($geopendeNieuwsitem->goedkeuringsstatus == "Goedgekeurd")
			<span>
				<a href="/admin/nieuwsitems/publiceren/{{ $geopendeNieuwsitem->nieuwsitem_id }}" class="btn btn-primary">Publiceren</a>
			</span>
		@endif

		@if($geopendeNieuwsitem->goedkeuringsstatus != "Goedgekeurd")
		<span>
			<a href="/admin/nieuwsitems/goedkeuren/{{ $geopendeNieuwsitem->nieuwsitem_id }}" class="btn btn-success">Artikel goedkeuren</a>
		</span>
		<span>
			<a href="/admin/nieuwsitems/publiceren/{{ $geopendeNieuwsitem->nieuwsitem_id }}" class="btn btn-primary">Goedkeuren en publiceren</a>
		</span>

		@endif
		@if($geopendeNieuwsitem->publicatieStatus == "Gepubliceerd")
			<span>
				<a href="/admin/nieuwsitems/offlineHalen/{{ $geopendeNieuwsitem->nieuwsitem_id }}" class="btn btn-warning">Offline halen</a>
			</span>
		@endif	
	@endif
	<span>
		<a href="/admin/nieuwsitems/wijzig/{{ $geopendeNieuwsitem->nieuwsitem_id }}" class="btn btn-primary">Wijzig Nieuwsitem</a>
	</span>
	

@endsection