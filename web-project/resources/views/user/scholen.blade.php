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
					Hallo, dit is de AP Hogeschool. Hierboven ziet u normaalgezien een foto van de campus op Park Spoor Noord. U kan er vanalle richtingen volgen. Deze tekst is slechts een test.
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
					Hallo, dit is de Karel De Grote-Hogeschool. Hierboven ziet u normaalgezien een foto van de nieuwe campus op het Zuid. U kan er vanalle richtingen volgen. Deze tekst is slechts een test.
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
					Hallo, dit is de Thomas More Hogeschool. Hierboven ziet u normaalgezien een foto van de campus in Mechelen. U kan er vanalle richtingen volgen. Deze tekst is slechts een test.
				</div>
			</div>
		</div>

	</div>
	</div>
@endsection
