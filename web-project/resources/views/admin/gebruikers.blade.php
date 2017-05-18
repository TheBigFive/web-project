@extends('layouts.admin')

@section('admincontent')
    <div class="row">
        <h2>Gebruikers</h2>
        <ul class="nav nav-pills" >
		  <li  class="active" id="alleGebruikersTabKnop"><a data-toggle="tab" href="#alleGebruikersTab">Alle gebruikers ({{ $aantalGebruikers }})</a></li>
		  <li><a data-toggle="tab" href="#administratorsTab">Administrators ({{ $aantalAdminGebruikers }})</a></li>
		  <li><a data-toggle="tab" href="#approversTab">Approvers ({{ $aantalApprovers }})</a></li>
		  <li><a data-toggle="tab" href="#editorsTab">Editors ({{ $aantalEditors }})</a></li>
		  <li><a data-toggle="tab" href="#zoekResultaatTab">Zoekresultaat</a></li>
		  <li><input id="search_input" type="text" style="width: 200px;" placeholder="Een gebruiker zoeken" /></li>

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
				<p>zoekresultaten</p>
				<!-- <table class="table">
					<thead>
						<tr>
							<th>Achternaam</th>
							<th>Voornaam</th>	
						</tr>				
					</thead>
					<tbody>
						@foreach($alleGebruikers as $gebruiker)
							<tr>
								<td>{{ $gebruiker->achternaam }}</td>
								<td>{{ $gebruiker->voornaam }}</td>
							</tr>

						@endforeach
					</tbody>
					
				</table> -->
			</div>


		</div>
		
		
    </div>

@endsection
