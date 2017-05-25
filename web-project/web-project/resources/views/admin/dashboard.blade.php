@extends('layouts.admin')

@section('admincontent')
<div class="container">
    <div class="row">
        Dashboard
        {{ Auth::user()->voornaam }}
        {{ Auth::user()->achternaam }}
        {{ Auth::user()->rol_id }}
    </div>
</div>
@endsection
