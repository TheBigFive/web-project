@extends('layouts.admin')

@section('admincontent')
<div class="container">
    <div class="row">
        <h2>Gebruikers</h2>
        <ul class="nav nav-pills" >
		  <li  class="active" id="alleGebruikersTabKnop"><a data-toggle="tab" href="#alleGebruikersTab">Alle gebruikers ({{ $aantalGebruikers }})</a></li>
		  <li role="presentation"><a data-toggle="tab" href="#administratorsTab">Administrators</a></li>
		  <li role="presentation"><a data-toggle="tab" href="#approversTab">Approvers</a></li>
		  <li role="presentation"><a data-toggle="tab" href="#zoekResultaatTab">Zoekresultaat</a></li>
		  <li><input id="search_input" type="text" style="width: 200px;" placeholder="Een gebruiker zoeken" /></li>

		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="alleGebruikersTab" > 
				<table class="table">
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
					
				</table>
			</div>

			<div class="tab-pane" id="administratorsTab" > 
				<p>administrators</p>
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
			<div class="tab-pane" id="approversTab" > 
				<p>approvers</p>
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
</div>
@endsection
