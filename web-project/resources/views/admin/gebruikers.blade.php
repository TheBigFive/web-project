@extends('layouts.admin')

@section('admincontent')
<div class="container">
    <div class="row">
        <h2>Gebruikers</h2>
        <ul class="nav nav-pills" >
		  <li role="presentation" class="active" id="alleGebruikersTab"><a href="">Alle gebruikers ({{ $aantalGebruikers }})</a></li>
		  <li role="presentation"><a href="#">Administrators</a></li>
		  <li role="presentation"><a href="#">Approver</a></li>
		  <li role="presentation"><a href="#">Zoekresultaat</a></li>
		</ul>
		<div class="tab-pane fade in active" role="tabpanel" id="alleGebruikers" aria-labelledby="alleGebruikersTab"> 
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
		
    </div>
</div>
@endsection
