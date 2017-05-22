@extends('layouts.admin')

@section('admincontent')
	<h2>Nieuwsitems</h2>
	<a class="btn btn-primary" href="/admin/nieuwsitems/toevoegen">Nieuwsitem toevoegen</a>
	<h4>Nieuwe nieuwsartikels</h4>
	<table class="table">
		<thead>
			<tr>
				<th>Titel</th>
				<th>Auteur</th>
				<th>Toegevoegd op</th>
				<th>Goedkeuringsstatus</th>	
			</tr>				
		</thead>
		<tbody>
			@foreach($alleNieuwsitems as $key => $nieuwsitem)
				@if($nieuwsitem->goedkeuringsstatus == 'Nieuw artikel')
					<tr>
						<td><a href="/admin/nieuwsitems/open/{{ $nieuwsitem->nieuwsitem_id }}">{{ $nieuwsitem->titel }}</a></td>
						<td>{{ $nieuwsitem->toegevoegddoor_id }}</td>
						<td>{{ $nieuwsitem->toegevoegdop }}</td>
						<td>{{ $nieuwsitem->goedkeuringsstatus }}</td>
						<td><a href="/admin/nieuwsitems/wijzig/{{ $nieuwsitem->nieuwsitem_id }}">Wijzigen</a></td>
						<td><a href="/admin/nieuwsitems/verwijder/{{ $nieuwsitem->nieuwsitem_id }}">Verwijderen</a></td>
					</tr>
				@endif
			@endforeach
		</tbody>
					
	</table>

	<h4>Nieuwsartikels</h4>
	<table class="table">
		<thead>
			<tr>
				<th>Titel</th>
				<th>Auteur</th>
				<th>Toegevoegd op</th>
				<th>Goedkeuringsstatus</th>	
			</tr>				
		</thead>
		<tbody>
			@foreach($alleNieuwsitems as $key => $nieuwsitem)
				<tr>
					<td><a href="/admin/nieuwsitems/open/{{ $nieuwsitem->nieuwsitem_id }}">{{ $nieuwsitem->titel }}</a></td>
					<td>{{ $nieuwsitem->toegevoegddoor_id }}</td>
					<td>{{ $nieuwsitem->toegevoegdop }}</td>
					<td>{{ $nieuwsitem->goedkeuringsstatus }}</td>
					<td><a href="/admin/nieuwsitems/wijzig/{{ $nieuwsitem->nieuwsitem_id }}">Wijzigen</a></td>
					<td><a href="/admin/nieuwsitems/verwijder/{{ $nieuwsitem->nieuwsitem_id }}">Verwijderen</a></td>
				</tr>
			@endforeach
		</tbody>
					
	</table>

@endsection