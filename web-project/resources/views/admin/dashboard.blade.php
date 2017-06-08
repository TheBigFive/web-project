@extends('layouts.admin')

@section('admincontent')
<div class="container">
<div class="gebruikerswrapper">
    <div class="row">
    
        	<h2 class="dashboardheading">Welkom {{ Auth::user()->voornaam }},</h2>
			<div class="dashboardcontent">
        		<h4>Profielgegevens</h4>
        		<p>Voornaam: {{ Auth::user()->voornaam }}</p>
        		<p>Achternaam: {{ Auth::user()->achternaam }}</p>
        		<p>Rol: {{ Auth::user()->rol_id }}</p>

				<p><a href="{{ url('/profiel') }}">Klik hier om meer van je profiel te bekijken</a></p>
			</div>
    </div>
</div>
</div>
@endsection