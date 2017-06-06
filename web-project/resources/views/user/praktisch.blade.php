@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/onepager.css') }}">
	<div class="container-fluid praktisch">
	
	<div id="vervoer" class="hoofdstuk"><!-- start van een hoofdstuk/onderdeel vervoer-->
		<div class="parallax" style="background-image: url('{{ asset('img/heroimages/hero6.jpg') }}');">
		<div class="fototekst">
		<i class="fa fa-map-o fa-1x" aria-hidden="true"></i>
		Ontdek</div>
		</div>
		<div class="tekst">
			<div class="col-md-4 col-lg-4">
				<div class="icon">
				<i class="fa fa-bus fa-1x" aria-hidden="true"></i>
				</div>
				<h1>Openbaar vervoer</h1>
				<p>Antwerpen biedt enorm veel mogelijkheden aan om je te verplaatsen. Neem de trein, tram, bus of metro, keuze uit meer dan 50 verschillende lijnen.</p>
			</div>

			<div class="col-md-4 col-lg-4">
				<div class="icon">
					<i class="fa fa-bicycle fa-1x" aria-hidden="true"></i>
				</div>
				<h1>Antwerpse vélokes</h1>
				<p>De rode fietsjes, onze vélokes, is dé troef van Antwerpen! 5000 duizend vélokes verdeelt over meer dan 200 standplaatsen zorgen ervoor dat je je overal in Antwerpen op eender welk moment makkelijk en vrij kan verplaatsen.</p>
			</div>

			<div class="col-md-4 col-lg-4">
				<div class="icon">
					<i class="fa fa-male fa-1x" aria-hidden="true"></i>
				</div>
				<h1>Antwerp by foot</h1>
				<p>Neem je tijd en wandel een rustig door Antwerpen en ontdek onze mooiste plekjes. Van de stripmuren in het Noorden, tot het glazen justitiepaleis in het Zuiden.</p>
			</div>
		</div>
	</div><!-- Einde van het hoofdstuk -->

	<div id="fuiven" class="hoofdstuk"><!-- start van een hoofdstuk/onderdeel fuiven-->
		<div class="parallax" style="background-image: url('{{ asset('img/heroimages/hero3.jpg') }}');">
		<div class="fototekst"><i class="fa fa-music fa-1x" aria-hidden="true"></i> Party mode</div>
		</div>
		<div class="tekst">
			<div class="col-md-4 col-lg-4">
				<div class="icon">
					<i class="fa fa-users fa-1x" aria-hidden="true"></i>
				</div>
				<h1>Studentenclub</h1>
				<p>Vrienden, vrienden en nog meer vrienden. Wordt lid van een studentenclub in Antwerpen en je jaar kan niet meer stuk. Studentenclubs zijn een vaste waarde in het Antwerpse studentenleven!</p>
			</div>

			<div class="col-md-4 col-lg-4">
				<div class="icon">
					<i class="fa fa-beer fa-1x" aria-hidden="true"></i>
				</div>
				<h1>Café</h1>
				<p>In Antwerpen heb je op de tientallen pleinen nog eens tientallen gezellige cafés. Even dorst? Keuze genoeg dus om die dorst te lessen</p>
			</div>

			<div class="col-md-4 col-lg-4">
				<div class="icon">
					<i class="fa fa-volume-up fa-1x" aria-hidden="true"></i>
				</div>
				<h1>Clubs</h1>
				<p>Overal in Antwerpen zijn er wel verschillende clubs te vinden. In de kelder van centraal-station of tussen de verlaten appartementsblokken op het zuid? Of in de straatjes van plezier? Gaan feesten is een ontdekking van Antwerpen op zich.</p>
			</div>
		</div>
	</div><!-- Einde van het hoofdstuk -->

	<div id="parken" class="hoofdstuk"><!-- start van een hoofdstuk/onderdeel parken-->
		<div class="parallax" style="background-image: url('{{ asset('img/heroimages/groen.jpg') }}');">
		<div class="fototekst"><i class="fa fa-leaf fa-1x" aria-hidden="true"></i> Groen</div>
		</div>
		<div class="tekst">
			<div class="col-md-4 col-lg-4">
				<div class="icon">
					<i class="fa fa-pagelines fa-1x" aria-hidden="true"></i>
				</div>
				<h1>Botanische tuinen</h1>
				<p>Vreemd genoeg toch genoeg stad gezien? Wil je even ontspannen en genieten van het pracht wat de natur ons allemaal te beiden heeft? Dan zijn de botanische tuinen de place to be voor jou. Het is alsof de tropen naar Antwerpen zijn verhuisd.</p>
			</div>

			<div class="col-md-4 col-lg-4">
				<div class="icon">
					<i class="fa fa-tree fa-1x" aria-hidden="true"></i>
				</div>
				<h1>Parken</h1>
				<p>Goei weer en zin om ergens rustig te ontspannen? Bezoek dan éen van onze 54 parken in en rond Antwerpen. Geniet van een fris pintje in het park bij de schuur aan park spoor noord of ga eens rustig wandelen in de rozentuin in Rivierenhof.</p>
			</div>

			<div class="col-md-4 col-lg-4">
				<div class="icon">
					<i class="fa fa-tree fa-1x" aria-hidden="true"></i>
				</div>
				<h1>Bossen</h1>
				<p>In onder andere de fortengordel rond Antwerpen vind je prachtige bossen. Omdat ze Antwerpen omringen moet je nooit ver gaan om even te gaan wandelen of fietsen in het bos.</p>
			</div>
		</div>
	</div><!-- Einde van het hoofdstuk -->

	<div id="sport" class="hoofdstuk"><!-- start van een hoofdstuk/onderdeel sport-->
		<div class="parallax" style="background-image: url('{{ asset('img/heroimages/hero4.jpg') }}');">
		<div class="fototekst"><i class="fa fa-flag-checkered fa-1x" aria-hidden="true"></i> Sport</div>
		</div>
		<div class="tekst">
			<div class="col-md-6 col-lg-6">
				<div class="icon">
					<i class="fa fa-shower fa-1x" aria-hidden="true"></i>
				</div>
				<h1>Zwemmen</h1>
				<p>Neem eens een duikje in 1 van de 11 zwembaden die je in Antwerpen vindt. Keuze genoeg dus, liever buiten in het zonnetje zwemmen in de openluchtzwembaden of baantjes trekken in het Olympisch zwembad? Het kan allemaal!</p>
			</div>

			<div class="col-md-6 col-lg-6">
				<div class="icon">
					<i class="fa fa-futbol-o fa-1x" aria-hidden="true"></i>
				</div>
				<h1>Studentenploeg</h1>
				<p>Altijd al eens in een ploeg willen spelen? In Antwerpen heb je de kans om mee te spelen in een studentenploeg. Dit kan van een school, een richting of een studentenclub zijn. Keuze genoeg in ploegen en in sporten! Van badminton met 2 tot voetbal met 11, aan jou de keuze.</p>
			</div>
		</div>
	</div><!-- Einde van het hoofdstuk -->

	<div id="kot" class="hoofdstuk"><!-- start van een hoofdstuk/onderdeel kot-->
		<div class="parallax" style="background-image: url('{{ asset('img/heroimages/hero8.jpg') }}');">
		<div class="fototekst"><i class="fa fa-home fa-1x" aria-hidden="true"></i> Op kot</div>
		</div>
		<div class="tekst">
			<div class="col-md-4 col-lg-4">
				<div class="icon">
					<i class="fa fa-bed fa-1x" aria-hidden="true"></i>
				</div>
				<h1>Kotzoektocht</h1>
				<p>Op kot gaan is altijd een avontuur. De start begint bij een kot te vinden. Via websites gefocust op koten is dat een makkie. Filteren op locatie, prijs en grootte, enkele foto's bezien en vastleggen maar. Alvast welkom in Antwerpen!</p>
			</div>

			<div class="col-md-4 col-lg-4">
				<div class="icon">
					<i class="fa fa-cutlery fa-1x" aria-hidden="true"></i>
				</div>
				<h1>Studentenrestaurants</h1>
				<p>Zit je al op kot en ben je dat koken beu? Bezoek dan één van onze studentenrestaurants waar je gevarieerde en gezonde voeding voor een prikje kunt kopen. Zo heb je snel, gezond en goedkoop iets heerlijk kunnen eten.</p>
			</div>

			<div class="col-md-4 col-lg-4">
				<div class="icon">
					<i class="fa fa-wifi fa-1x" aria-hidden="true"></i>
				</div>
				<h1>Antwerp wi-free</h1>
				<p>Antwerpen biedt gratis WiFi aan over heel het centrum. Geen probleem dus als je databundel is opgebruikt en je toch nog snel iets moet opzoeken.</p>
			</div>
		</div>
	</div><!-- Einde van het hoofdstuk -->
</div>
@endsection