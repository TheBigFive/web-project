@extends('layouts.admin')

@section('admincontent')
    <div class="row">
        <h2>Gebruikers</h2>

        <form action="{{ url('admin/gebruikers/zoeken') }}" method="post">
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

        <ul class="nav nav-pills" >
			  <li  @if(!Session::has('zoekResultaten')) class="active" @endif id="alleGebruikersTabKnop"><a data-toggle="tab" href="#alleGebruikersTab">Alle gebruikers ({{ $aantalGebruikers }})</a></li>
			  <li><a data-toggle="tab" href="#administratorsTab">Administrators ({{ $aantalAdminGebruikers }})</a></li>
			  <li><a data-toggle="tab" href="#approversTab">Approvers ({{ $aantalApprovers }})</a></li>
			  <li><a data-toggle="tab" href="#editorsTab">Editors ({{ $aantalEditors }})</a></li>
			  @if (Session::has('zoekResultaten'))
			  	<li class="active"><a data-toggle="tab" href="#zoekResultaatTab">Zoekresultaten ({{ Session::get('aantalZoekResultaten') }}) </a></li>
			  @endif

		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="alleGebruikersTab" > 
				<table class="table">
					<thead>
						<tr>
							<th>Achternaam</th>
							<th>Voornaam</th>
							<th>Rol</th>	
						</tr>				
					</thead>
					<tbody>
						@foreach($alleGebruikers as $key => $gebruiker)
							<tr>
								<td>{{ $gebruiker->achternaam }}</td>
								<td>{{ $gebruiker->voornaam }}</td>
								<td>{{ $rollenVanAlleGebruikers{$key}->first()->naam }}</td>
								<td><a href="/admin/gebruikers/wijzig/{{ $gebruiker->id }}">Wijzigen</a></td>
								<td><a href="/admin/gebruikers/verwijder/{{ $gebruiker->id }}">Verwijderen</a></td>
							</tr>

						@endforeach
					</tbody>
					
				</table>
			</div>

			<div class="tab-pane" id="administratorsTab" > 
				<table class="table">
					<thead>
						<tr>
							<th>Achternaam</th>
							<th>Voornaam</th>
						</tr>				
					</thead>
					<tbody>
						@foreach($adminGebruikers as $key => $adminGebruiker)
							<tr>
								<td>{{ $adminGebruiker->achternaam }}</td>
								<td>{{ $adminGebruiker->voornaam }}</td>
								<td><a href="/admin/gebruikers/wijzig/{{ $adminGebruiker->id }}">Wijzigen</a></td>
								<td><a href="/admin/gebruikers/verwijder/{{ $adminGebruiker->id }}">Verwijderen</a></td>
							</tr>

						@endforeach
					</tbody>
					
				</table>
			</div>
			<div class="tab-pane" id="approversTab" >
				
					<table class="table">
						<thead>
							<tr>
								<th>Achternaam</th>
								<th>Voornaam</th>
							</tr>				
						</thead>

						<tbody>
							@foreach($approvers as $approver)
								<tr>
									<td>{{ $approver->achternaam }}</td>
									<td>{{ $approver->voornaam }}</td>
									<td><a href="/admin/gebruikers/wijzig/{{ $approver->id }}">Wijzigen</a></td>
									<td><a href="/admin/gebruikers/verwijder/{{ $approver->id }}">Verwijderen</a></td>
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
							<th>Achternaam</th>
							<th>Voornaam</th>
						</tr>				
					</thead>
					<tbody>
						@foreach($editors as $editor)
							<tr>
								<td>{{ $editor->achternaam }}</td>
								<td>{{ $editor->voornaam }}</td>
								<td><a href="/admin/gebruikers/wijzig/{{ $editor->id }}">Wijzigen</a></td>
								<td><a href="/admin/gebruikers/verwijder/{{ $editor->id }}">Verwijderen</a></td>
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
								<th>Achternaam</th>
								<th>Voornaam</th>	
							</tr>				
						</thead>
						
						<tbody>
							@if (Session::has('zoekResultaten'))
								@if (Session::get('aantalZoekResultaten') > 0 )
									@foreach ( Session::pull('zoekResultaten') as $zoekResultaat )
										<td>{{ $zoekResultaat->achternaam }}</td>
										<td>{{ $zoekResultaat->voornaam }}</td>
										<td><a href="/admin/gebruikers/wijzig/{{ $zoekResultaat->id }}">Wijzigen</a></td>
										<td><a href="/admin/gebruikers/verwijder/{{ $zoekResultaat->id }}">Verwijderen</a></td>
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

@endsection
