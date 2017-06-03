@extends('layouts.app')
@section('content')
	<div class="container">
		<table class="nieuwsbericht">
			<tr>
				<td>
					<img src="{{ asset('img/school1.jpg') }}">
					<p> 
						Hier komt de titel 
					</p>
				</td>
			</tr>
			<tr>
				<td>
					<p> 
						Hallo, dit is de AP Hogeschool. Hierboven ziet u normaalgezien een foto van de campus op Park Spoor Noord. U kan er vanalle richtingen volgen. Deze tekst is slechts een test. 
					</p>
				</td>
				<td>
					<p> 
						Dit is de artikeltekst en komt gewoon van Wikipedia. 

						AP, of voluit Artesis Plantijn Hogeschool Antwerpen, is een hogeschool in Antwerpen, ontstaan als een fusie tussen Artesis Hogeschool Antwerpen en Plantijn Hogeschool.

						De hogeschool is in academiejaar 2013-2014 gestart met 22 bacheloropleidingen, 6 kunstopleidingen en meer dan 8.500 studenten. Op 12 december 2012 werd Artesis Plantijn Hogeschool Antwerpen als nieuwe naam voor de Antwerpse fusie bekendgemaakt.[1][2] De Artesis Plantijn Hogeschool is ook lid van AUHA, de Associatie Universiteit en Hogescholen Antwerpen.
					</p>
				</td>
				<td>
					<p> 
						23-05-2017 
					</p>
				</td>
			</tr>
		</table>
	</div>
@endsection