@extends('layouts.admin')

@section('admincontent')
	<div class="gebruikerswrapper">
		<h2>Bezienswaardigheden</h2>
		<a class="btn btn-primary" href="/admin/bezienswaardigheden/toevoegen">Bezienswaardigheid toevoegen</a>

		@if ($aantalNieuweEnGewijzigdeBezienswaardigheden > 0)
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
													<th>Bezienswaardigheid</th>
													<th>Publicatiestatus</th>
													<th>Toegevoegd op</th>
													<th>Goedkeuringsstatus</th>	
												</tr>				
											</thead>
											<tbody>
												@foreach($alleBezienswaardigheden as $key => $bezienswaardigheid)
													@if($bezienswaardigheid->goedkeuringsstatus == 'Nieuwe bezienswaardigheid' || $bezienswaardigheid->goedkeuringsstatus == 'Werd gewijzigd')
														<tr>
															<td>{{ $key+1 }}</td>
															<td><a href="/admin/bezienswaardigheden/open/{{ $bezienswaardigheid->bezienswaardigheid_id }}">{{ $bezienswaardigheid->naam }}</a></td>
															<td>{{ $bezienswaardigheid->publicatieStatus }}</td>
															<td>{{ $bezienswaardigheid->toegevoegdop }}</td>
															<td>{{ $bezienswaardigheid->goedkeuringsstatus }}</td>
															<td><a href="/admin/bezienswaardigheden/wijzig/{{ $bezienswaardigheid->bezienswaardigheid_id }}" class="text-inverse" title="Edit" data-toggle="tooltip"><i class="fa fa-pencil"></i></a></td>
															@if (Auth::user()->rol_id!=4)
																<td><a href="/admin/bezienswaardigheden/verwijder/{{ $bezienswaardigheid->bezienswaardigheid_id }}" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="fa fa-trash"></i></a></td>
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


		<h4>Alle Bezienswaardigheden</h4>

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
												<th>Bezienswaardigheid</th>
												<th>Publicatiestatus</th>
												<th>Toegevoegd op</th>
												<th>Goedkeuringsstatus</th>	
											</tr>				
										</thead>
										<tbody>
											@foreach($alleBezienswaardigheden as $key => $bezienswaardigheid)
												<tr>
													<td>{{ $key+1 }}</td>
													<td><a href="/admin/bezienswaardigheden/open/{{ $bezienswaardigheid->bezienswaardigheid_id }}">{{ $bezienswaardigheid->naam }}</a></td>
													<td>{{ $bezienswaardigheid->publicatieStatus }}</td>
													<td>{{ $bezienswaardigheid->toegevoegdop }}</td>
													<td>{{ $bezienswaardigheid->goedkeuringsstatus }}</td>
													<td><a href="/admin/bezienswaardigheden/wijzig/{{ $bezienswaardigheid->bezienswaardigheid_id }}" class="text-inverse" title="Edit" data-toggle="tooltip"><i class="fa fa-pencil"></i></a></td>
													@if (Auth::user()->rol_id!=4)
														<td><a href="/admin/bezienswaardigheden/verwijder/{{ $bezienswaardigheid->bezienswaardigheid_id }}" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="fa fa-trash"></i></a></td>
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