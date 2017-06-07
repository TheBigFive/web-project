@extends('layouts.app')
@section('content')

<div class="schoolheroimage container-fluid">
	<img src="img/gamehero.jpg">
</div>
	
	<div class="container">
		<!--<div class="kolom col-xs-12 col-sm-6 col-md-4 col-lg-4">-->
		<div class="demo">
			<video width="41%" height="41%" autoplay class="videospel">
				<source src="img/movie.mp4" type="video/mp4">
			</video>
			<img src="img/empty_smartphone.png" class="legesmartphone" style="text-align: center; width: 50%; height: auto;">
		</div>

		<div class="demo" style="margin-top: 2%; margin-bottom: 4%;">
			<a href="http://play.google.com">
			<img src="img/google_play_button.png" style="text-align: center;">
			</a>
		</div>

		<div class="demo">
			<img src="img/line-png-32.png" style="width: 100%;">
			<!--<p>________________________________________________________________________________________________________________________________________</p>-->
		</div>
	
		<div class="kolom col-xs-12 col-sm-6 col-md-4 col-lg-4">
			<div class="afbeelding">
				<img src="img/game_afbeelding1.png" style="text-align: center;">
			</div>
		</div>

		<div class="kolom col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<div class="afbeeldingtekst">
				<h3>Speel 3 verschillende levels!</h3>
			</div>
		</div>
		
		<div class="achtergrondkleur"></div>

		<div class="kolom col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<div class="afbeelding2">
				<img src="img/game_afbeelding2.png" style="text-align: center;">
			</div>
		</div>

		<div class="kolom col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<div class="afbeeldingtekst2">
				<h3 style="color: white;">Ontdek de stad terwijl je vliegt!</h3>
			</div>
		</div>

		<div class="kolom col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<div class="afbeeldingtekst3">
				<h3>Speel tegen je vrienden!</h3>
			</div>
		</div>
		
		<div class="kolom col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<div class="afbeelding3">
				<img src="img/game_afbeelding3.png" style="text-align: center;">
			</div>
		</div>



	</div>
@endsection
