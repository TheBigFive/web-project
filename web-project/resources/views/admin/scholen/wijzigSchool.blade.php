@extends('layouts.admin')
@section('admincontent')

<div class="row heading-bg  bg-blue">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h2 class="txt-light" style="margin-top: 3%; margin-left: 29%; width: 100%;">School wijzigen</h2>
    </div>
</div>

<div class="gebruikerswrapper">

	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<form action="/admin/scholen/wijzig/{{ $geopendeSchool->school_id }}" method="post">
					@if( session()->has('succesBericht'))
			        	@if(!$errors->all())
			        		<div class="alert alert-success">
					            De bezienswaardighed werd succesvol gewijzigd.
					        </div>
				    	@endif
			        @endif
					{!! csrf_field() !!}
					<div class="form-group">
					    <label for="naam" class="nieuwstoevoegen">Naam school</label>
					    <input type="text" name="naam" class="form-control" placeholder="Typ hier de naam van de school" value="{{ $geopendeSchool->naam }}">
					    @if ($errors->has('naam'))
						    <span class="help-block">
						        <strong>{{ $errors->first('naam') }}</strong>
						    </span>
						@endif
					</div>
					<div class="form-group">
					    <label for="beschrijving" class="nieuwstoevoegen">Beschrijving school</label>
					    <textarea rows="5" name="beschrijving" class="form-control summernote" placeholder="Typ hier de beschrijving van de school">{{ $geopendeSchool->beschrijving }}</textarea>
					    @if ($errors->has('beschrijving'))
						    <span class="help-block">
						        <strong>{{ $errors->first('beschrijving') }}</strong>
						    </span>
						@endif
					</div>

					<div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
					    <label for="website" class="nieuwstoevoegen">Website</label>
					    <input type="text" name="website" class="form-control" placeholder="Typ hier de website van de school" value="{{ $geopendeSchool->website }}">
						@if ($errors->has('website'))
						    <span class="help-block">
							    <strong>{{ $errors->first('website') }}</strong>
						    </span>
						@endif
					</div>

					
					<div class="form-group knoponderaan">
						<input type="submit" class="btn btn-primary" value="Wijzig school">
						@if (Auth::user()->rol_id!=4)
						  	<span>
						        <a href="/admin/scholen/verwijder/{{ $geopendeSchool->school_id }}" class="btn btn-danger">School verwijderen</a>
							</span>
						@endif
					</div>
				</form>
			</div>
			<div class="col-md-4">
				<h4>Logo</h4>
			    @foreach($alleSchoolMedia as $key => $media)
			    	@if($media->mediaType == "schoolLogo")
						<img height="60px" src="{{ asset($media->link)  }}">
					@endif
				@endforeach
				<h4 class="videotitel">Afbeeldingen</h4>
				@foreach($alleSchoolMedia as $media)
					@if($media->mediaType == "Afbeelding")
						<img height="60px" src="{{ asset($media->link)  }}">
					@endif
				@endforeach
			</div>
		</div>

		<h3 class="nieuwstoevoegen">Media wijzigen</h3>
			<form action="/admin/scholen/toevoegenMedia/{{ $geopendeSchool->school_id }}" method="post" enctype="multipart/form-data">
				{!! csrf_field() !!}
    			<div class="row">
    				<div class="col-md-3">
    					<h4>Wijzig Logo School</h4>
						<div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
							<label for="logo">Voeg een nieuwe logo toe</label>
							<input type="file" name="logo"/><br/>
							@if ($errors->has('logo'))
							    <span class="help-block">
								    <strong>{{ $errors->first('logo') }}</strong>
							    </span>
							@endif
						</div>
    				</div>    		
    				<div class="col-md-3">
    					<h4>Wijzig afbeelding school</h4>				
						<div class="form-group{{ $errors->has('afbeelding') ? ' has-error' : '' }}">
							<label for="afbeelding">Voeg een nieuwe afbeelding van de school toe</label>
							<input type="file" name="afbeelding" multiple="true" /><br/>
							@if ($errors->has('afbeelding'))
							    <span class="help-block">
								    <strong>{{ $errors->first('afbeelding') }}</strong>
							    </span>
							@endif
						</div>
    				</div>					
    			</div>
    			<input type="submit" class="btn btn-primary" value="Media Wijzigen">
			</form>	
	</div>
</div>

@endsection