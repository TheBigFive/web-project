@extends('layouts.admin')

@section('admincontent')
<div class="gebruikerswrapper">
	<div class="container">
		<h2>Nieuwsartikel: {{ $geopendeNieuwsitem->titel }}</h2>

		@if( session()->has('succesBericht'))
	        	@if(!$errors->all())
	        	<div class="alert alert-success">
			        {{ session()->get('succesBericht') }}
			    </div>
		    @endif
	    @endif
	
	
    	<div class="row">
    		<div class="col-md-6">
				<h4>Introtekst:</h4>
				<!-- Dit zorgt ervoor dat \n en \r niet genegeerd worden -->
				<p>{!! nl2br(e($geopendeNieuwsitem->introtekst)) !!}</p>
				<h4>Artikel:</h4>
				<!-- Dit zorgt ervoor dat \n en \r niet genegeerd worden -->
				<p>{!! nl2br(e($geopendeNieuwsitem->artikel)) !!}</p>
				<h4>Auteur:</h4>
				<p>{{ $geopendeNieuwsitem->toegevoegddoor_voornaam }} {{ $geopendeNieuwsitem->toegevoegddoor_achternaam }}</p>
				<h4>Tag:</h4>
				<p>{{ $geopendeNieuwsitem->tag_naam }}</p>
				<h4>Goedkeuringsstatus:</h4>
				<p> {{ $geopendeNieuwsitem->goedkeuringsstatus }}</p>
				<h4>Publicatiestatus: </h4>
				<p>{{ $geopendeNieuwsitem->publicatieStatus }}</p>
				@if ($geopendeNieuwsitem->redenVanAfwijzing)
					<h4>Reden van afwijzing: </h4>
					<p>{{ $geopendeNieuwsitem->redenVanAfwijzing }}</p>
				@endif
			</div>

		    <div class="col-md-6">
		    	<h3>Media</h3>
		     	<h4>Afbeeldingen</h4>
		     	@if($aantalAfbeeldingen > 0 )
			     	@foreach($alleNieuwsitemMedia as $key => $media)
			     		@if($media->mediaType == "Afbeelding")
							<img height="60px" src="{{ asset($media->link)  }}">
						@endif
					@endforeach
				@else
					<p>Dit nieuwsitem heeft geen afbeeldingen.</p>
				@endif

				<h4>Video's</h4>
				@if($aantalVideos > 0 )
			     	@foreach($alleNieuwsitemMedia as $key => $media)
			     		@if($media->mediaType == "Video")
							<iframe width="160" height="130" src="https://www.youtube.com/embed/{{ $media->link }}" frameborder="0" allowfullscreen></iframe>
						@endif
					@endforeach
				@else
					<p>Dit nieuwsitem heeft geen video's.</p>
				@endif
		    </div>
    		
    	</div>

    
		@if (Auth::user()->rol_id!=4)
			@if($geopendeNieuwsitem->goedkeuringsstatus == "Goedgekeurd")
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
				@if ($geopendeNieuwsitem->publicatieStatus == "Gepubliceerd")
					<span>
						<a href="/admin/nieuwsitems/offlineHalen/{{ $geopendeNieuwsitem->nieuwsitem_id }}" class="btn btn-warning">Offline halen</a>
					</span>
				@else
					<span>
						<a href="/admin/nieuwsitems/publiceren/{{ $geopendeNieuwsitem->nieuwsitem_id }}" class="btn btn-primary">Publiceren</a>
					</span>
				@endif
				
			@else
				<span>
					<a href="/admin/nieuwsitems/goedkeuren/{{ $geopendeNieuwsitem->nieuwsitem_id }}" class="btn btn-success">Artikel goedkeuren</a>
				</span>
				@if ($geopendeNieuwsitem->publicatieStatus == "Gepubliceerd")
					<span>
						<a href="/admin/nieuwsitems/offlineHalen/{{ $geopendeNieuwsitem->nieuwsitem_id }}" class="btn btn-warning">Offline halen</a>
					</span>
				@else
					<span>
						<a href="/admin/nieuwsitems/publiceren/{{ $geopendeNieuwsitem->nieuwsitem_id }}" class="btn btn-primary">Goedkeuren en publiceren</a>
					</span>
				@endif

			@endif

		@endif
		<span>
			<a href="/admin/nieuwsitems/wijzig/{{ $geopendeNieuwsitem->nieuwsitem_id }}" class="btn btn-primary">Wijzig Nieuwsitem</a>
		</span>
	</div>
@endsection