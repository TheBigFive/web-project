@extends('layouts.app')
@section('content')
	<div class="nieuwsberichten container">
	<div class="nieuwsitems">
	<?php $i=0; $j=0; ?>
	<table>
	<tr><td>
	@foreach($alleNieuwsitems as $key => $nieuwsitem)
		
		<div class="kolom">
			<div class="foto">
			<svg viewbox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
				<defs>
			    	<pattern id="img" patternUnits="userSpaceOnUse" width="100" height="100">
			    		<image xlink:href="img/hero1.jpg" y="-25" x="-25" width="150" height="150" />
			    	</pattern>
				</defs>
				<polygon points="50 1 100 25 100 75 50 99 0 75 0 25" fill="url(#img)"/>
			</svg>
			</div>
			<div class="nieuws tekst">
				<div class="datum">
				{{ date('d-m-Y', strtotime($nieuwsitem->toegevoegdop))}}
				</div>
				<div class="auteur">
					{{ $nieuwsitem->toegevoegddoor_voornaam }} {{ $nieuwsitem->toegevoegddoor_achternaam }}
				</div>
				<div class="titel">
				{{ $nieuwsitem->titel }}
				</div>
				<div class="introtekst">
					{{ $nieuwsitem->introtekst }}
				</div>
			</div>
		</div>
		
		<?php $i++; if($i>2) {
			echo "</td></tr><tr>"; 
			$i=0;
			}  ?>
	@endforeach
	</tr>
	</table>
	</div>
	</div>
@endsection
