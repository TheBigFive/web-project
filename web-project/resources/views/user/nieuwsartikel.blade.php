@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/nieuwsartikel.css') }}" >
<div class="container">
	<h1>Testcontent</h1><h1>{!! $geopendeNieuwsitem->titel !!}</h1>
</div>
@endsectiopn