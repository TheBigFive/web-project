@extends('layouts.admin')
@section('admincontent')

<div class="row heading-bg  bg-blue">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h2 class="txt-light" style="margin-top: 3%; margin-left: 6%; width: 100%;">Testimonials</h2>
    </div>
</div>


<div class="gebruikerswrapper">


	<a class="btn btn-primary nieuwstoevoegenknop" href="/admin/testimonials/toevoegen">Testimonial toevoegen</a>


	<h4 class="nieuwstitel">Moeten nog goedgekeurd worden:</h4>

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
				<th>Titel</th>
				<th>Auteur</th>
				<th>Publicatiestatus</th>
				<th>Toegevoegd op</th>
				<th>Goedkeuringsstatus</th>	
			</tr>				
		</thead>
		<tbody>
			@foreach($alleTestimonials as $key => $testimonial)
				@if($testimonial->goedkeuringsstatus == 'Nieuwe testimonial' || $testimonial->goedkeuringsstatus == 'Werd gewijzigd')
					<tr>
						<td>{{ $key+1 }}</td>
						<td><a href="/admin/testimonials/open/{{ $testimonial->testimonial_id }}">{{ $testimonial->titel }}</a></td>
						<td>{{ $testimonial->toegevoegddoor_voornaam }} {{ $testimonial->toegevoegddoor_achternaam }}</td>
						<td>{{ $testimonial->publicatieStatus }}</td>
						<td>{{ $testimonial->toegevoegdop }}</td>
						<td>{{ $testimonial->goedkeuringsstatus }}</td>
						<td><a href="/admin/testimonials/wijzig/{{ $testimonial->testimonial_id }}" class="text-inverse" title="Edit" data-toggle="tooltip"><i class="fa fa-pencil"></i></a></td>
						@if (Auth::user()->rol_id!=4)
							<td><a href="/admin/testimonials/verwijder/{{ $testimonial->testimonial_id }}" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="fa fa-trash"></i></a></td>
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


	<h4 class="nieuwstitel">Testimonials</h4>

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
				<th>Titel</th>
				<th>Auteur</th>
				<th>Publicatiestatus</th>
				<th>Toegevoegd op</th>
				<th>Goedkeuringsstatus</th>	
			</tr>				
		</thead>
		<tbody>
			@foreach($alleTestimonials as $key => $testimonial)
				<tr>
					<td>{{ $key+1 }}</td>
					<td><a href="/admin/testimonials/open/{{ $testimonial->testimonial_id }}">{{ $testimonial->titel }}</a></td>
					<td>{{ $testimonial->toegevoegddoor_voornaam }} {{ $testimonial->toegevoegddoor_achternaam }}</td>
					<td>{{ $testimonial->publicatieStatus }}</td>
					<td>{{ $testimonial->toegevoegdop }}</td>
					<td>{{ $testimonial->goedkeuringsstatus }}</td>
					<td><a href="/admin/testimonials/wijzig/{{ $testimonial->testimonial_id }}" class="text-inverse" title="Edit" data-toggle="tooltip"><i class="fa fa-pencil"></i></a></td>
					@if (Auth::user()->rol_id!=4)
						<td><a href="/admin/testimonials/verwijder/{{ $testimonial->testimonial_id }}" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="fa fa-trash"></i></a></td>
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