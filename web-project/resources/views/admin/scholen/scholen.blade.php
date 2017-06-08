@extends('layouts.admin')

@section('admincontent')
	<div class="gebruikerswrapper">
		<h2>Scholen</h2>
		<a class="btn btn-primary" href="/admin/scholen/toevoegen">School Toevoegen</a>

		@if ($aantalNieuweEnGewijzigdeScholen > 0)
			<h4>Moeten nog goedgekeurd worden:</h4>

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
													<th>School</th>
													<th>Publicatiestatus</th>
													<th>Toegevoegd op</th>
													<th>Goedkeuringsstatus</th>	
												</tr>				
											</thead>
											<tbody>
												@foreach($alleScholen as $key => $school)
													@if($school->goedkeuringsstatus == 'Nieuwe school' || $school->goedkeuringsstatus == 'Werd gewijzigd')
														<tr>
															<td>{{ $key+1 }}</td>
															<td><a href="/admin/scholen/open/{{ $school->school_id }}">{{ $school->naam }}</a></td>
															<td>{{ $school->publicatieStatus }}</td>
															<td>{{ $school->toegevoegdop }}</td>
															<td>{{ $school->goedkeuringsstatus }}</td>
															<td><a href="/admin/scholen/wijzig/{{ $school->school_id }}" class="text-inverse" title="Edit" data-toggle="tooltip"><i class="fa fa-pencil"></i></a></td>
															@if (Auth::user()->rol_id!=4)
																<td><a href="/admin/scholen/verwijder/{{ $school->school_id }}" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="fa fa-trash"></i></a></td>
															@endif
														</tr>
													@endif
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
		@endif


		<h4>Alle scholen</h4>

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
												<th>School</th>
												<th>Publicatiestatus</th>
												<th>Toegevoegd op</th>
												<th>Goedkeuringsstatus</th>	
											</tr>				
										</thead>
										<tbody>
											@foreach($alleScholen as $key => $school)
												<tr>
													<td>{{ $key+1 }}</td>
													<td><a href="/admin/scholen/open/{{ $school->school_id }}">{{ $school->naam }}</a></td>
													<td>{{ $school->publicatieStatus }}</td>
													<td>{{ $school->toegevoegdop }}</td>
													<td>{{ $school->goedkeuringsstatus }}</td>
													<td><a href="/admin/scholen/wijzig/{{ $school->school_id }}" class="text-inverse" title="Edit" data-toggle="tooltip"><i class="fa fa-pencil"></i></a></td>
													@if (Auth::user()->rol_id!=4)
														<td><a href="/admin/scholen/verwijder/{{ $school->school_id }}" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="fa fa-trash"></i></a></td>
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


@endsection