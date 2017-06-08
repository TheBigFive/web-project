@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="{{ asset('css/spel.css') }}" >

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
			<img src="img/line-png-32.png" style="width: 100%; margin-bottom: 3%;">
		</div>


		<div class="gameInfo gameInfo1">
			<div class="blok khoogte kolom col-xs-12 col-sm-6 col-md-3 col-lg-3"></div>

			<div class="khoogte kolom col-xs-12 col-sm-6 col-md-3 col-lg-3">
				<div class="afbeelding">
					<img src="img/game_afbeelding1.png" style="text-align: center;">
				</div>
			</div>
			<div class="khoogte kolom col-xs-12 col-sm-6 col-md-3 col-lg-3">
				<div class="afbeeldingtekst">
					<h3 style="text-align: center;">Speel 3 verschillende levels!</h3>
				</div>
			</div>

			<div class="blok khoogte kolom col-xs-12 col-sm-6 col-md-3 col-lg-3"></div>
		</div>
		
		<div class="gameInfo gameInfo2 achtergrondkleur">
			<div class="blok khoogte kolom col-xs-12 col-sm-6 col-md-3 col-lg-3"></div>

			<div class="khoogte kolom col-xs-12 col-sm-6 col-md-3 col-lg-3" >
				<div class="afbeeldingtekst uitzondering">
					<h3 style="text-align: center;">Ontdek de stad terwijl je vliegt!</h3>
				</div>
			</div>
			<div class="khoogte kolom col-xs-12 col-sm-6 col-md-3 col-lg-3">
				<div class="afbeelding">
					<img src="img/game_afbeelding2.png" style="text-align: center;">
				</div>
			</div>

			<div class="blok khoogte kolom col-xs-12 col-sm-6 col-md-3 col-lg-3"></div>
		</div>

		<div class="gameInfo gameInfo3">
			<div class="blok khoogte kolom col-xs-12 col-sm-6 col-md-3 col-lg-3"></div>

			<div class="beker khoogte kolom col-xs-12 col-sm-6 col-md-3 col-lg-3" style="margin-bottom: 5%;">
				<div class="afbeelding">
					<img src="img/game_afbeelding3.png" style="text-align: center;">
				</div>
			</div>

			<div class="khoogte kolom col-xs-12 col-sm-6 col-md-3 col-lg-3">
				<div class="afbeeldingtekst">
					<h3 class="laatste" style="text-align: center;">Speel tegen je vrienden!</h3>
				</div>
			</div>
			
			<div class="blok khoogte kolom col-xs-12 col-sm-6 col-md-3 col-lg-3"></div>
		</div>
		</div>
	</div>
@endsection
