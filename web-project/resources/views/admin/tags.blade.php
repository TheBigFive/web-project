@extends('layouts.admin')

@section('admincontent')
<div class="gebruikerswrapper">

	<h2>Tags</h2>
	<button class="btn btn-primary" id="tagToevoegenKnop">Tag toevoegen</button>
	<form id="tagForm" action="/admin/tags/toevoegen/" method="post">     	
		{!! csrf_field() !!}
		<div class="form-group">
		    <label for="tag">Tagnaam</label>
		    <input type="text" name="tag" class="form-control" placeholder="Typ hier de tagnaam"></input>
		    @if ($errors->has('tag'))
			    <span class="help-block">
			        <strong>{{ $errors->first('tag') }}</strong>
			    </span>
			@endif
		</div>
		<button type="button" id="tagAnnulerenKnop" class="btn btn-primary">
			Annuleren
		</button>
		<span>
			<input type="submit" class="btn btn-danger" value="Tag toevoegen">
		</span>	
	</form>
	@if( session()->has('foutmelding'))
       	@if(!$errors->all())
        	<div class="alert alert-danger">
		        {{ session()->get('foutmelding') }}
		    </div>
	    @endif
	@endif

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
												<th>Tagnaam</th>
											</tr>				
										</thead>
										<tbody>
											@foreach($alleTags as $key => $tag)
													<tr>
														<td>{{ $key+1 }}</td>
														<td>{{ $tag->naam }}</td>
														<td><a href="/admin/tags/verwijder/{{ $tag->tag_id }}" class="text-inverse" title="Delete" data-toggle="tooltip"><i class="fa fa-trash"></i></a></td>
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