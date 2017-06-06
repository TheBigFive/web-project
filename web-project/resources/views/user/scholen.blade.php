@extends('layouts.app')
@section('content')

<div class="schoolheroimage container-fluid">
	<img src="img/schoolhero2.jpg">
</div>

	<div class="container">
	<div class="nieuwsitems">
	
		<div class="container inhoud">
			<h4>Antwerpen heeft een zeer groot aanbod aan hogescholen en universiteiten waardoor wij bijna elke opleiding kunnen aanbieden!</h4>
		</div>



		<div class="kolom col-xs-12 col-sm-6 col-md-4 col-lg-4">
			<div class="foto">
				<a href="{{ url('school') }}">
					<svg viewbox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
						<defs>
					    	<pattern id="img1" patternUnits="userSpaceOnUse" width="100" height="100">
					    		<image xlink:href="img/school1.jpg" y="-25" x="-25" width="150" height="150" />
					    	</pattern>
						</defs>
						<polygon points="50 1 100 25 100 75 50 99 0 75 0 25" fill="url(#img1)"/>
					</svg>
				</a>
			</div>
			<div class="nieuws tekst">
				<h2 class="titel">
					<a href="{{ url('school') }}">
						AP-Hogeschool
					</a>
				</h2>
				<div class="introtekst">
					AP is een hogeschool met zo’n 12.000 studenten, 19 HBO5-opleidingen, 24 professionele bachelor- en 8 artistieke opleidingen, verdeeld over 4 departementen en 2 schools of arts. Ook al is de fusiehogeschool nieuw, toch hebben we al een lange geschiedenis, denk maar aan de Koninklijke Academie voor Schone Kunsten en het Koninklijk Conservatorium Antwerpen. 
				</div>
			</div>
		</div>

<!---------------------->

			<div class="kolom col-xs-12 col-sm-6 col-md-4 col-lg-4">
			<div class="foto">
				<a href="{{ url('school') }}">
					<svg viewbox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
						<defs>
					    	<pattern id="img2" patternUnits="userSpaceOnUse" width="100" height="100">
					    		<image xlink:href="img/school2.jpg" y="-25" x="-25" width="150" height="150" />
					    	</pattern>
						</defs>
						<polygon points="50 1 100 25 100 75 50 99 0 75 0 25" fill="url(#img2)"/>
					</svg>
				</a>
			</div>
			<div class="nieuws tekst">
				<h2 class="titel">
					<a href="{{ url('school') }}">
						Karel De Grote-Hogeschool
					</a>
				</h2>
				<div class="introtekst">
					De Karel de Grote Hogeschool is een katholieke hogeschool in Antwerpen met ongeveer 12.000 studenten en ongeveer 1.200 werknemers. De school is genoemd naar Karel de Grote (742-814). Vóór het ontstaan van de hogescholen UCLL en Vives, was de Karel de Grote-hogeschool de derde hogeschool van Vlaanderen na de Hogeschool Gent en de Arteveldehogeschool.
				</div>
			</div>
		</div>

<!---------------------->

			<div class="kolom col-xs-12 col-sm-6 col-md-4 col-lg-4">
			<div class="foto">
				<a href="{{ url('school') }}">
					<svg viewbox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
						<defs>
					    	<pattern id="img3" patternUnits="userSpaceOnUse" width="100" height="100">
					    		<image xlink:href="img/school3.jpg" y="-25" x="-25" width="150" height="150" />
					    	</pattern>
						</defs>
						<polygon points="50 1 100 25 100 75 50 99 0 75 0 25" fill="url(#img3)"/>
					</svg>
				</a>
			</div>
			<div class="nieuws tekst">
				<h2 class="titel">
					<a href="{{ url('school') }}">
						Thomas More
					</a>
				</h2>
				<div class="introtekst">
					Thomas More is een unie van hogescholen binnen de Associatie KU Leuven. Zij biedt studenten innovatief professioneel hoger onderwijs in nauwe samenwerking met het werkveld. Door haar toonaangevend onderwijs, toepassingsgericht onderzoek en dienstverlening vormt zij een motor van regionale ontwikkeling.
				</div>
			</div>
		</div>

	</div>
	</div>
@endsection
