@extends('layouts.admin')
@section('admincontent')

<div class="row heading-bg  bg-blue">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h2 class="txt-light" style="margin-top: 3%; margin-left: 29%; width: 100%;">Nieuwsitem wijzigen</h2>
    </div>
</div>

<div class="gebruikerswrapper">

	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<form action="/admin/nieuwsitems/wijzig/{{ $geopendeNieuwsitem->nieuwsitem_id }}" method="post">
					@if( session()->has('succesBericht'))
			        				@if(!$errors->all())
			        					<div class="alert alert-success">
						                    Het nieuwsartikel werd succesvol gewijzigd.
						              </div>
				        			@endif
			        			@endif        	
				 	{!! csrf_field() !!}
					<div class="form-group">
					    <label for="titel" class="nieuwstoevoegen">Titel nieuwsartikel</label>
					    <input type="text" name="titel" class="form-control" value="{{ $geopendeNieuwsitem->titel }}" placeholder="Typ hier de titel van het nieuwsartikel">
					    @if ($errors->has('titel'))
						    <span class="help-block">
						        <strong>{{ $errors->first('titel') }}</strong>
						    </span>
						@endif
					</div>
					<div class="form-group">
					    <label for="introtekst" class="nieuwstoevoegen">Introtekst</label>
					    <textarea rows="5" name="introtekst" class="form-control summernote" placeholder="Typ hier je introtekst">{{ $geopendeNieuwsitem->introtekst }}</textarea>
					    @if ($errors->has('introtekst'))
						    <span class="help-block">
						        <strong>{{ $errors->first('introtekst') }}</strong>
						    </span>
						@endif
					</div>
					  <div class="form-group">
					    <label for="beschrijving" class="nieuwstoevoegen">Artikel</label>
					    <textarea rows="5" name="artikel" class="form-control summernote" placeholder="Typ hier je artikel">{{ $geopendeNieuwsitem->artikel }}</textarea>
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
					    	@if ($geopendeNieuwsitem->tag_naam == $tag->naam)
					    		<option selected value="{{ $tag->tag_id }}">{{ $tag->naam }}</option>
						   	@else
						   		<option value="{{ $tag->tag_id }}">{{ $tag->naam }}</option>
							@endif
						@endforeach
						</select>
						@if ($errors->has('tag'))
						    <span class="help-block">
							    <strong>{{ $errors->first('tag') }}</strong>
						    </span>
						@endif
					</div>
					
					<div class="form-group knoponderaan">
					  		@if (Auth::user()->rol_id!=4)
							  	<span>
							        <a href="/admin/nieuwsitems/verwijder/{{ $geopendeNieuwsitem->nieuwsitem_id }}" class="btn btn-danger">Nieuwsitem verwijderen</a>
							   	</span>
						   	@endif

							<span><input type="submit" class="btn btn-primary" value="Wijzig artikel"></span>
					</div>						
					
				</form>
			</div>
			<div class="col-md-4">
				<h4>Afbeeldingen</h4>
				@if( session()->has('hoofdafbeeldingmelding'))
					<div class="alert alert-danger">
					    {{ session()->get('hoofdafbeeldingmelding') }}
					</div>							    
				@endif
				@if($aantalAfbeeldingen > 0 )
					@foreach($alleNieuwsitemMedia as $media)
						@if($media->mediaType == "Afbeelding")
							<div class="geheel">
							<img height="60px" src="{{ asset($media->link)  }}">
							<div class="middle">
							@if($media->isHoofdafbeelding == true)
								<p style="margin-bottom: -3%;">Momenteel ingesteld als hoofdafbeelding</p>
							@else
								<a class="text" href="/admin/nieuwsitems/stelHoofdafbeeldingIn/{{ $media->media_id }}" title="Zet als hoofdafbeelding" data-toggle="tooltip"><i class="fa fa-home"></i></a>
							@endif
							<a class="text" href="/admin/nieuwsitems/verwijderMedia/{{ $media->media_id }}"><i class="fa fa-trash" title="Verwijderen" data-toggle="tooltip"></i></a>
							</div>
							</div>
						@endif
					@endforeach
				@else
					<p>Dit nieuwsitem heeft geen afbeeldingen.</p>
				@endif
				
				<h4 class="videotitel">Video</h4>
				@if($aantalVideos > 0 )
			     	@foreach($alleNieuwsitemMedia as $key => $media)
			     		@if($media->mediaType == "Video")
							<iframe width="160" height="160" src="https://www.youtube.com/embed/{{ $media->link }}" frameborder="0" allowfullscreen></iframe>
							<a href="/admin/nieuwsitems/verwijderMedia/{{ $media->media_id }}">verwijderen</a>
						@endif
					@endforeach
				@else
					<p>Dit nieuwsitem heeft geen video's.</p>
				@endif
			</div>
		</div>
		
			<h3>Extra media toevoegen</h3>
			<form action="/admin/nieuwsitems/toevoegenMedia/{{ $geopendeNieuwsitem->nieuwsitem_id }}" method="post" enctype="multipart/form-data">
				{!! csrf_field() !!}
    			<div class="row">
    				<div class="col-md-3">
    					<h4>Afbeelding toevoegen</h4>				
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
    				<div class="col-md-3">
    					<h4>Video toevoegen</h4>
						<div class="form-group{{ $errors->has('video') ? ' has-error' : '' }}">
							<label for="video">Voeg een youtube videolink toe</label>
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
    			<input type="submit" class="btn btn-primary" value="Media Toevoegen">
			</form>	
	</div>
	
	

	

</div>

@endsection