@extends('layouts.app')
@section('content')
	<div class="nieuwsberichten container">
	<div class="nieuwsitems">


		<div class="kolom">
		<li>
			<div class="foto">
			<svg viewbox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
				<defs>
			    	<pattern id="img1" patternUnits="userSpaceOnUse" width="100" height="100">
			    		<image xlink:href="img/school1.jpg" y="-25" x="-25" width="150" height="150" />
			    	</pattern>
				</defs>
				<polygon points="50 1 100 25 100 75 50 99 0 75 0 25" fill="url(#img1)"/>
			</svg>
			</div>
			<div class="nieuws tekst">
				<div class="datum">
					23-05-2017
				</div>
				<div class="auteur">
					Tom Aat
				</div>
				<div class="titel">
					<a href="{{ url('school') }}">
						AP-Hogeschool
					</a>
				</div>
				<div class="introtekst">
					Hallo, dit is de AP Hogeschool. Hierboven ziet u normaalgezien een foto van de campus op Park Spoor Noord. U kan er vanalle richtingen volgen. Deze tekst is slechts een test.
				</div>
			</div>
		</li>
		</div>

<!---------------------->

		<div class="kolom">
		<li>
			<div class="foto">
			<svg viewbox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
				<defs>
			    	<pattern id="img2" patternUnits="userSpaceOnUse" width="100" height="100">
			    		<image xlink:href="img/school2.jpg" y="-25" x="-25" width="150" height="150" />
			    	</pattern>
				</defs>
				<polygon points="50 1 100 25 100 75 50 99 0 75 0 25" fill="url(#img2)"/>
			</svg>
			</div>
			<div class="nieuws tekst">
				<div class="datum">
					24-05-2017
				</div>
				<div class="auteur">
					Peter Selie
				</div>
				<div class="titel">
					<a href="school/#">
						Karel De Grote-Hogeschool
					</a>
				</div>
				<div class="introtekst">
					Hallo, dit is de Karel De Grote-Hogeschool. Hierboven ziet u normaalgezien een foto van de nieuwe campus op het Zuid. U kan er vanalle richtingen volgen. Deze tekst is slechts een test.
				</div>
			</div>
		</li>
		</div>


<!---------------------->

		<div class="kolom">
		<li>
			<div class="foto">
			<svg viewbox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
				<defs>
			    	<pattern id="img3" patternUnits="userSpaceOnUse" width="100" height="100">
			    		<image xlink:href="img/school3.jpg" y="-25" x="-25" width="150" height="150" />
			    	</pattern>
				</defs>
				<polygon points="50 1 100 25 100 75 50 99 0 75 0 25" fill="url(#img3)"/>
			</svg>
			</div>
			<div class="nieuws tekst">
				<div class="datum">
					25-05-2017
				</div>
				<div class="auteur">
					Nonkel Jef
				</div>
				<div class="titel">
					<a href="school/#">
						Thomas More
					</a>
				</div>
				<div class="introtekst">
					Hallo, dit is de Thomas More Hogeschool. Hierboven ziet u normaalgezien een foto van de campus in Mechelen. U kan er vanalle richtingen volgen. Deze tekst is slechts een test.
				</div>
			</div>
		</li>
		</div>


	</div>
	</div>
@endsection
