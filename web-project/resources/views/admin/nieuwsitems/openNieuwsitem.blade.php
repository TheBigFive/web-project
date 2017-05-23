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

	@if (Auth::user()->rol_id!=4)
		<span>
			<a href="/admin/nieuwsitems/afwijzen/{{ $geopendeNieuwsitem->nieuwsitem_id }}" class="btn btn-danger">Artikel afwijzen</a>
		</span>	
		<span>
			<a href="/admin/nieuwsitems/goedkeuren/{{ $geopendeNieuwsitem->nieuwsitem_id }}" class="btn btn-success">Artikel goedkeuren</a>
		</span>	
	@endif
	

@endsection