@extends('layouts.admin')
@section('admincontent')

<div class="row heading-bg  bg-blue">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h2 class="txt-light" style="margin-top: 3%; margin-left: 29%; width: 100%;">School</h2>
    </div>
</div>


<div class="gebruikerswrapper">

	<h2>School: {{ $geopendeSchool->naam }}</h2>

	@if( session()->has('succesBericht'))
        	@if(!$errors->all())
        	<div class="alert alert-success">
		        {{ session()->get('succesBericht') }}
		    </div>
	    @endif
    @endif
    <div class="row">
    		<div class="col-md-6">
			    <h4 class="nieuwsgoedkeuren">Naam school</h4>    
				<p>{{ $geopendeSchool->naam }}</p>
				<h4 class="nieuwsgoedkeuren">Beschrijving</h4>
				<p>{!! $geopendeSchool->beschrijving !!}</p>
				<h4 class="nieuwsgoedkeuren">Website</h4>
				<p><a href="{{ $geopendeSchool->website }}">{{ $geopendeSchool->website }}</a></p>
				<h4 class="nieuwsgoedkeuren">Toegevoegd door</h4>
				<p>{{ $geopendeSchool->toegevoegddoor_voornaam }} {{ $geopendeSchool->toegevoegddoor_achternaam }}</p>
				<h4 class="nieuwsgoedkeuren">Goedkeuringsstatus:</h4>
				<p>{{ $geopendeSchool->goedkeuringsstatus }}</p>
				<h4 class="nieuwsgoedkeuren">Publicatiestatus:</h4>
				<p>{{ $geopendeSchool->publicatieStatus }}</p>
				@if ($geopendeSchool->redenVanAfwijzing)
					<h4 class="nieuwsgoedkeuren">Reden van afwijzing: </h4>
					<p>{{ $geopendeSchool->redenVanAfwijzing }}</p>
				@endif
			</div>

		    <div class="col-md-6">
		    	<h3>Media</h3>
		     	<h4>Logo</h4>
			    @foreach($alleSchoolMedia as $key => $media)
			    	@if($media->mediaType == "schoolLogo")
						<img height="60px" src="{{ asset($media->link)  }}">
					@endif
				@endforeach
				<h4 class="nieuwsgoedkeuren">Afbeelding</h4>
				@foreach($alleSchoolMedia as $key => $media)
			     	@if($media->mediaType == "Afbeelding")
						<img height="60px" src="{{ asset($media->link)  }}">
					@endif
				@endforeach

			</div>
	</div>

	<div class="opennieuwsknoppenonderaan">
	@if (Auth::user()->rol_id!=4)
			@if($geopendeSchool->goedkeuringsstatus == "Goedgekeurd")
				<span>
					<button type="button" id="afwijzingKnop" class="btn btn-danger">
	    				Scholen Afwijzen en reden meegeven
	  				</button>
				</span>
				<form class="afwijzingForm" action="/admin/scholen/afwijzen/{{ $geopendeSchool->school_id }}" method="post">     	
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
					<button type="button" id="afwijzingAnnulerenKnop" class="btn btn-primary">
	    				Afwijzing annuleren
	  				</button>
					<span>
						<input type="submit" class="btn btn-danger" value="scholen afwijzen">
					</span>	
				</form>
				@if ($geopendeSchool->publicatieStatus == "Gepubliceerd")
					<span>
						<a href="/admin/scholen/offlineHalen/{{ $geopendeSchool->school_id }}" class="btn btn-warning">Offline halen</a>
					</span>
				@else
					<span>
						<a href="/admin/scholen/publiceren/{{ $geopendeSchool->school_id }}" class="btn btn-primary">Publiceren</a>
					</span>
				@endif
				
			@else   
				@if($geopendeSchool->goedkeuringsstatus == "Nieuwe school")
					<span>
						<button type="button" id="afwijzingKnop" class="btn btn-danger">
		    				Scholen Afwijzen en reden meegeven
		  				</button>
					</span>
					<form class="afwijzingForm" action="/admin/scholen/afwijzen/{{ $geopendeSchool->school_id }}" method="post">     	
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
						<button type="button" id="afwijzingAnnulerenKnop" class="btn btn-primary">
		    				Afwijzing annuleren
		  				</button>
						<span>
							<input type="submit" class="btn btn-danger" value="scholen afwijzen">
						</span>	
					</form>
				@endif
				<span>
					<a href="/admin/scholen/goedkeuren/{{ $geopendeSchool->school_id }}" class="btn btn-success">scholen goedkeuren</a>
				</span>
				@if ($geopendeSchool->publicatieStatus == "Gepubliceerd")
					<span>
						<a href="/admin/scholen/offlineHalen/{{ $geopendeSchool->school_id }}" class="btn btn-warning">Offline halen</a>
					</span>
				@else
					<span>
						<a href="/admin/scholen/publiceren/{{ $geopendeSchool->school_id }}" class="btn btn-success">Goedkeuren en publiceren</a>
					</span>
				@endif

			@endif

	@endif
	<span>
		<a href="/admin/scholen/wijzig/{{ $geopendeSchool->school_id }}" class="btn btn-primary">Wijzig school</a>
	</span>
	</div>
	
	<div class="row">
		<div class="col-md-6">
			<h3>Campussen</h3>
			<a href="/admin/scholen/campus/toevoegen/{{ $geopendeSchool->school_id }}"><button class="btn btn-primary nieuwstoevoegenknop" id="campusToevoegenKnop" style="margin-bottom: 2%;">Campus toevoegen</button></a>
			<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="tab-content table-wrap mt-40">
											<div class="tab-pane active table-responsive active">
												<table class="table">
												<thead>
													<tr>
														<th>#</th>
														<th>Campus</th>
														<th>adres</th>
													</tr>				
												</thead>
												<tbody>
													@foreach($alleCampussen as $key => $campus)
															<tr>
																<td>{{ $key+1 }}</td>
																<td>{{ $campus->naam }}</td>
																<td>{{ $campus->adres }}</td>
																@if (Auth::user()->rol_id!=4)
																	<td><a href="/admin/scholen/campus/verwijder/{{ $campus->campus_id }}" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="fa fa-trash"></i></a></td>
																@endif
															</tr>
													@endforeach
												</tbody>
																
											</table>
											</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		

		<div class="col-md-6">
			<h3>Interessegebieden</h3>
			<a href="/admin/scholen/interessegebied/toevoegen/{{ $geopendeSchool->school_id }}"><button class="btn btn-primary nieuwstoevoegenknop" id="interessegebiedToevoegenKnop" style="margin-bottom: 2%;">Interessegebied toevoegen</button></a>
			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-default card-view">
						<div class="panel-wrapper collapse in">
							<div class="panel-body">
								<div class="tab-content table-wrap mt-40">
									<div class="tab-pane active table-responsive active">
										<table class="table">
											<thead>
												<tr>
													<th>#</th>
													<th>Interessegebied</th>
													<th>link</th>
												</tr>				
											</thead>
											<tbody>
												@foreach($alleInteressegebieden as $key => $interessegebied)
														<tr>
															<td>{{ $key+1 }}</td>
															<td>{{ $interessegebied->naam }}</td>
															<td>{{ substr($interessegebied->link,0,25).'...' }}</td>
															@if (Auth::user()->rol_id!=4)
																<td><a href="/admin/scholen/interessegebied/verwijder/{{ $interessegebied->interessegebied_id }}" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="fa fa-trash"></i></a></td>
															@endif
														</tr>
												@endforeach
											</tbody>
															
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>			
		</div>
	</div>
	
</div>


	

@endsection