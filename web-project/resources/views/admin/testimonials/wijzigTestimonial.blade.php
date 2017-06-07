@extends('layouts.admin')

@section('admincontent')

<div class="gebruikerswrapper">

	<h2>Testimonial wijzigen</h2>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
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
					    <label for="leeftijd_persoon">Leeftijd persoon</label>
					    <input type="number" name="leeftijd_persoon" class="form-control" placeholder="Typ hier de leeftijd van de persoon die het verhaal vertelt" value="{{ $geopendeTestimonial->leeftijd_persoon }}">
					    @if ($errors->has('leeftijd_persoon'))
						    <span class="help-block">
						        <strong>{{ $errors->first('leeftijd_persoon') }}</strong>
						    </span>
						@endif
					</div>
					<div class="form-group">
					    <label for="functie_persoon">Functie persoon</label>
					    <input type="text" name="functie_persoon" class="form-control" placeholder="Typ hier de functie van de persoon die het verhaal vertelt: vb. Student Marketing" value="{{ $geopendeTestimonial->functie_persoon }}">
					    @if ($errors->has('functie_persoon'))
						    <span class="help-block">
						        <strong>{{ $errors->first('functie_persoon') }}</strong>
						    </span>
						@endif
					</div>
					<div class="form-group">
					    <label for="beschrijving_persoon">Beschrijving persoon</label>
					    <textarea rows="5" name="beschrijving_persoon" class="form-control summernote" placeholder="Typ hier de beschrijving van de persoon">{{ $geopendeTestimonial->beschrijving_persoon }}</textarea>
					    @if ($errors->has('beschrijving_persoon'))
						    <span class="help-block">
						        <strong>{{ $errors->first('beschrijving_persoon') }}</strong>
						    </span>
						@endif
					</div>
					<div class="form-group">
					    <label for="tekstvorm_testimonial">Artikel</label>
					    <textarea rows="5" name="tekstvorm_testimonial" class="form-control summernote" placeholder="Typ hier je artikel">{{ $geopendeTestimonial->tekstvorm_testimonial }}</textarea>
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
						   	@if ($geopendeTestimonial->tag_naam == $tag->naam)
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
					<div class="form-group">
						@if (Auth::user()->rol_id!=4)
						  	<span>
						        <a href="/admin/testimonials/verwijder/{{ $geopendeTestimonial->testimonial_id }}" class="btn btn-danger">Testimonial verwijderen</a>
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
					@foreach($alleTestimonialMedia as $media)
						@if($media->mediaType == "Afbeelding")
							<img height="60px" src="{{ asset($media->link)  }}">
							<a href="/admin/testimonials/verwijderMedia/{{ $media->media_id }}">verwijderen</a>
							@if($media->isHoofdafbeelding == false)
								<a href="/admin/testimonials/stelHoofdafbeeldingIn/{{ $media->media_id }}">Instellen als hoofdafbeelding</a>
							@endif
						@endif
					@endforeach
				@else
					<p>Dit nieuwsitem heeft geen afbeeldingen.</p>
				@endif
				<h4>Video</h4>
				@if($aantalVideos > 0 )
			     	@foreach($alleTestimonialMedia as $key => $media)
			     		@if($media->mediaType == "Video")
							<iframe width="160" height="160" src="https://www.youtube.com/embed/{{ $media->link }}" frameborder="0" allowfullscreen></iframe>
							<a href="/admin/testimonials/verwijderMedia/{{ $media->media_id }}">verwijderen</a>
						@endif
					@endforeach
				@else
					<p>Dit nieuwsitem heeft geen video's.</p>
				@endif
			</div>
		</div>
		
			<h3>Extra media toevoegen</h3>
			<form action="/admin/testimonials/toevoegenMedia/{{ $geopendeTestimonial->testimonial_id }}" method="post" enctype="multipart/form-data">
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

		

</div>

@endsection