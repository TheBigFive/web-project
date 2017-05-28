@extends('layouts.admin')
@section('admincontent')
<div class="gebruikerswrapper">
    <div class="row">
        <h2>Gebruikers</h2>

        <form action="{{ url('admin/gebruikers/zoeken') }}" method="post" class="gebruikerszoekform">
	        {!! csrf_field() !!}

	        <div class="form-group{{ $errors->has('teZoekenGebruiker') ? ' has-error' : '' }}">
	            <input type="text" class="form-control" name="teZoekenGebruiker" placeholder="Typ hier de naam van de gebruiker">
	            @if ($errors->has('teZoekenGebruiker'))
	                <span class="help-block">
	    	            <strong>{{ $errors->first('teZoekenGebruiker') }}</strong>
	                </span>
	            @endif
	        </div>

	        <input type="submit" name="zoeken" class="btn btn-primary" value="Gebruiker zoeken">
	    </form>
	    
	    <div class="spacer"></div>

        <ul class="nav nav-pills gebruikersnav" >
			  <li  @if(!Session::has('zoekResultaten')) class="active" @endif id="alleGebruikersTabKnop"><a data-toggle="tab" href="#alleGebruikersTab">Alle gebruikers ({{ $aantalGebruikers }})</a></li>
			  <li><a data-toggle="tab" href="#administratorsTab">Administrators ({{ $aantalAdminGebruikers }})</a></li>
			  <li><a data-toggle="tab" href="#approversTab">Approvers ({{ $aantalApprovers }})</a></li>
			  <li><a data-toggle="tab" href="#editorsTab">Editors ({{ $aantalEditors }})</a></li>
			  @if (Session::has('zoekResultaten'))
			  	<li class="active"><a data-toggle="tab" href="#zoekResultaatTab">Zoekresultaten ({{ Session::get('aantalZoekResultaten') }}) </a></li>
			  @endif

		</ul>



	<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-default card-view">
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
							<div class="tab-content table-wrap mt-40">

			<div class="tab-pane active table-responsive active" id="alleGebruikersTab">
				<table class="table mb-0">


<!--
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-default card-view">
					<div class="panel-wrapper collapse in">
						<div class="panel-body">
							<div class="tab-content table-wrap mt-40">

			<div class="tab-pane active table-responsive active" id="alleGebruikersTab">
				<table id="edit_datable_2" class="table mb-0">
-->
					<thead>
						<tr>
							<th>#</th>
							<th>Achternaam</th>
							<th>Voornaam</th>
							<th>Rol</th>	
						</tr>				
					</thead>
					<tbody>
						<?php $i=1; ?>
						@foreach($alleGebruikers as $key => $gebruiker)
							<tr>
								<td><?php echo $i; $i++; ?></td>
								<td>{{ $gebruiker->achternaam }}</td>
								<td>{{ $gebruiker->voornaam }}</td>
								<td>
									@if($gebruiker->rol_naam == "Administrator")							
										<span class="label label-danger">{{ $gebruiker->rol_naam }}</span>
										
									@elseif($gebruiker->rol_naam == "Approver")
											<span class="label label-success">{{ $gebruiker->rol_naam }}</span>
									@elseif($gebruiker->rol_naam == "Editor")
										<span class="label label-warning">{{ $gebruiker->rol_naam }}</span>
									@elseif($gebruiker->rol_naam == "Gebruiker")
										<span class="label label-info">{{ $gebruiker->rol_naam }}</span>
									@endif								
								</td>
								<td><a href="/admin/gebruikers/wijzig/{{ $gebruiker->id }}" class="text-inverse" title="Edit" data-toggle="tooltip"><i class="fa fa-pencil"></i></a></td>
								<td><a href="/admin/gebruikers/verwijder/{{ $gebruiker->id }}" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="fa fa-trash"></i></a></td>
							</tr>

						@endforeach
					</tbody>
					
				</table>
			</div>

			<div class="tab-pane" id="administratorsTab" > 
				<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Achternaam</th>
							<th>Voornaam</th>
							<th>Rol</th>
						</tr>				
					</thead>
					<tbody>
						<?php $i=1; ?>
						@foreach($adminGebruikers as $key => $adminGebruiker)
							<tr>
								<td><?php echo $i; $i++; ?></td>
								<td>{{ $adminGebruiker->achternaam }}</td>
								<td>{{ $adminGebruiker->voornaam }}</td>
								<td>			
									<span class="label label-danger">{{ $adminGebruiker->rol_naam }}</span>	
								</td>
								<td><a href="/admin/gebruikers/wijzig/{{ $adminGebruiker->id }}" class="text-inverse" title="Edit" data-toggle="tooltip"><i class="fa fa-pencil"></i></a></td>
								<td><a href="/admin/gebruikers/verwijder/{{ $adminGebruiker->id }}" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="fa fa-trash"></i></a></td>
							</tr>

						@endforeach
					</tbody>
					
				</table>
			</div>
			<div class="tab-pane" id="approversTab" >
				
					<table class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>Achternaam</th>
								<th>Voornaam</th>
								<th>Rol</th>
							</tr>				
						</thead>

						<tbody>
							<?php $i=1; ?>
							@foreach($approvers as $approver)
								<tr>
									<td><?php echo $i; $i++; ?></td>
									<td>{{ $approver->achternaam }}</td>
									<td>{{ $approver->voornaam }}</td>
									<td><span class="label label-success">{{ $approver->rol_naam }}</span></td>
									<td><a href="/admin/gebruikers/wijzig/{{ $approver->id }}" class="text-inverse" title="Edit" data-toggle="tooltip"><i class="fa fa-pencil"></i></a></td>
									<td><a href="/admin/gebruikers/verwijder/{{ $approver->id }}" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="fa fa-trash"></i></a></td>
								</tr>

							@endforeach
						</tbody>
						
					</table>
				@if (!$aantalApprovers)
					<p>Er zijn nog geen approvers aangeduid.</p>
				@endif
			</div>
			<div class="tab-pane" id="editorsTab" > 
				<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Achternaam</th>
							<th>Voornaam</th>
							<th>Rol</th>
						</tr>				
					</thead>
					<tbody>
						<?php $i=1; ?>
						@foreach($editors as $editor)
							<tr>
								<td><?php echo $i; $i++; ?></td>
								<td>{{ $editor->achternaam }}</td>
								<td>{{ $editor->voornaam }}</td>
								<td><span class="label label-warning">{{ $editor->rol_naam }}</span></td>
								<td><a href="/admin/gebruikers/wijzig/{{ $editor->id }}" class="text-inverse" title="Edit" data-toggle="tooltip"><i class="fa fa-pencil"></i></a></td>
								<td><a href="/admin/gebruikers/verwijder/{{ $editor->id }}" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="fa fa-trash"></i></a></td>
							</tr>

						@endforeach
					</tbody>
				</table>					

				@if (!$aantalEditors)
					<p>Er zijn nog geen editors aangeduid.</p>
				@endif
			</div>

			
				<div class="tab-pane" id="zoekResultaatTab" > 
				
					<table class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>Achternaam</th>
								<th>Voornaam</th>
								<th>Rol</th>	
							</tr>				
						</thead>
						
						<tbody>
							@if (Session::has('zoekResultaten'))
								@if (Session::get('aantalZoekResultaten') > 0 )
									<?php $i=1; ?>
									@foreach ( Session::pull('zoekResultaten') as $zoekResultaat )
										<td><?php echo $i; $i++; ?></td>
										<td>{{ $zoekResultaat->achternaam }}</td>
										<td>{{ $zoekResultaat->voornaam }}</td>
										<td>
											@if($zoekResultaat->rol_naam == "Administrator")
												<span class="label label-danger">{{ $zoekResultaat->rol_naam }}</span>
											@elseif($zoekResultaat->rol_naam == "Approver")
												<span class="label label-success">{{ $zoekResultaat->rol_naam }}</span>
											@elseif($zoekResultaat->rol_naam == "Editor")
												<span class="label label-warning">{{ $zoekResultaat->rol_naam }}</span>
											@elseif($zoekResultaat->rol_naam == "Gebruiker")
												<span class="label label-info">{{ $zoekResultaat->rol_naam }}</span>
											@endif
										</td>
										<td><a href="/admin/gebruikers/wijzig/{{ $zoekResultaat->id }}" class="text-inverse" title="Edit" data-toggle="tooltip"><i class="fa fa-pencil"></i></a></td>
										<td><a href="/admin/gebruikers/verwijder/{{ $zoekResultaat->id }}" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="fa fa-trash"></i></a></td>
									@endforeach
								
						</tbody>
					</table>
								@else
						</tbody>
					</table>
					{{ Session::forget('zoekResultaten') }}
					<p>Er werden geen gebruikers gevonden.</p>
								@endif
							@endif
				
				</div>
			


		</div>
		
		
    </div>
</div>


@endsection