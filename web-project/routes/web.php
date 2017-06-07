<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/', 'NieuwsitemController@ophalenNieuwsitemWelkom');
Route::get('/home', 'HomeController@index');
Route::get('nieuwsberichten','NieuwsitemController@ophalenNieuwsitem');
Route::get('nieuwsbericht/{id}','NieuwsitemController@openNieuwsitem');

Route::get('praktisch','PraktischController@index');
Route::get('scholen', 'ScholenController@ophalenSchool');
Route::get('school', 'ScholenController@openSchool');
/*Route::get('school/{id}', 'ScholenController@openSchool');*/

//Administratie routes die iedereen mag uitvoeren
Route::group(['middleware' => 'rol:Administrator,Approver,Editor'], function () {
	Route::get('admin', 'AdminController@index');
	//Gebruiker routes
	Route::get('admin/gebruikers', 'AdminController@gebruikersPaginaOpenen');
	Route::post('admin/gebruikers/zoeken','AdminController@zoekGebruikerViaNaam');
	//Nieuwsitems routes
	Route::get('admin/nieuwsitems','NieuwsitemController@index');
	Route::get('admin/nieuwsitems/toevoegen','NieuwsitemController@openToevoegenNieuwsitem');
	Route::post('admin/nieuwsitems/toevoegen','NieuwsitemController@voegNieuwsitemToe');
	Route::get('admin/nieuwsitems/wijzig/{id}', 'NieuwsitemController@openWijzigingNieuwsitem');
	Route::post('admin/nieuwsitems/wijzig/{id}', 'NieuwsitemController@wijzigNieuwsitem');
	Route::get('admin/nieuwsitems/open/{id}', 'NieuwsitemController@openNieuwsitemAdmin');
	Route::get('admin/nieuwsitems/verwijderMedia/{id}', 'NieuwsitemController@verwijderMediaNieuwsitem');
	Route::post('admin/nieuwsitems/toevoegenMedia/{id}', 'NieuwsitemController@toevoegenMediaNieuwsitem');
	Route::get('admin/nieuwsitems/stelHoofdafbeeldingIn/{id}', 'NieuwsitemController@stelHoofdafbeeldingIn');

	//Testimonials routes
	Route::get('admin/testimonials','TestimonialController@index');
	Route::get('admin/testimonials/toevoegen','TestimonialController@openToevoegenTestimonial');
	Route::post('admin/testimonials/toevoegen','TestimonialController@voegTestimonialToe');
	Route::get('admin/testimonials/wijzig/{id}', 'TestimonialController@openWijzigingTestimonial');
	Route::post('admin/testimonials/wijzig/{id}', 'TestimonialController@wijzigTestimonial');
	Route::get('admin/testimonials/open/{id}', 'TestimonialController@openTestimonial');
	Route::post('admin/testimonials/toevoegenMedia/{id}', 'TestimonialController@toevoegenMediaTestimonial');
	Route::get('admin/testimonials/verwijderMedia/{id}', 'TestimonialController@verwijderMediaTestimonial');
	Route::get('admin/testimonials/stelHoofdafbeeldingIn/{id}', 'TestimonialController@stelHoofdafbeeldingIn');

	//Bezienswaardigheden
	Route::get('admin/bezienswaardigheden','BezienswaardigheidController@index');
	Route::get('admin/bezienswaardigheden/toevoegen','BezienswaardigheidController@openToevoegenBezienswaardigheid');
	Route::post('admin/bezienswaardigheden/toevoegen','BezienswaardigheidController@voegBezienswaardigheidToe');
	Route::get('admin/bezienswaardigheden/wijzig/{id}', 'BezienswaardigheidController@openWijzigingBezienswaardigheid');
	Route::post('admin/bezienswaardigheden/wijzig/{id}', 'BezienswaardigheidController@wijzigBezienswaardigheid');
	Route::get('admin/bezienswaardigheden/open/{id}', 'BezienswaardigheidController@openBezienswaardigheidAdmin');
	Route::post('admin/bezienswaardigheden/toevoegenMedia/{id}', 'BezienswaardigheidController@toevoegenMediaBezienswaardigheid');
	Route::get('admin/bezienswaardigheden/verwijderMedia/{id}', 'BezienswaardigheidController@afbeeldingVerwijderen');

	//Tags
	Route::get('admin/tags','TagsController@index');
	Route::post('admin/tags/toevoegen/','TagsController@voegTagToe');
	Route::get('admin/tags/verwijder/{id}','TagsController@verwijderTag');
	
	
	
});


//Administratieroutes die Approver en Admin mag uitvoeren
Route::group(['middleware' => 'rol:Administrator,Approver'], function () {	
	
	//Nieuwsitems routes
	Route::get('admin/nieuwsitems/verwijder/{id}', 'NieuwsitemController@verwijderNieuwsitem');
	Route::get('admin/nieuwsitems/goedkeuren/{id}', 'NieuwsitemController@goedkeurenNieuwsitem');
	Route::post('admin/nieuwsitems/afwijzen/{id}', 'NieuwsitemController@afwijzenNieuwsitem');
	Route::get('admin/nieuwsitems/publiceren/{id}', 'NieuwsitemController@publicerenNieuwsitem');
	Route::get('admin/nieuwsitems/offlineHalen/{id}', 'NieuwsitemController@offlineHalenNieuwsitem');
	
	//Testimonials routes
	Route::get('admin/testimonials/verwijder/{id}', 'TestimonialController@verwijderTestimonial');
	Route::get('admin/testimonials/goedkeuren/{id}', 'TestimonialController@goedkeurenTestimonial');
	Route::post('admin/testimonials/afwijzen/{id}', 'TestimonialController@afwijzenTestimonial');
	Route::get('admin/testimonials/publiceren/{id}', 'TestimonialController@publicerenTestimonial');
	Route::get('admin/testimonials/offlineHalen/{id}', 'TestimonialController@offlineHalenTestimonial');

	//Bezienswaardigheden routes
	Route::get('admin/bezienswaardigheden/verwijder/{id}', 'BezienswaardigheidController@verwijderBezienswaardigheid');
	Route::get('admin/bezienswaardigheden/goedkeuren/{id}', 'BezienswaardigheidController@goedkeurenBezienswaardigheid');
	Route::post('admin/bezienswaardigheden/afwijzen/{id}', 'BezienswaardigheidController@afwijzenBezienswaardigheid');
	Route::get('admin/bezienswaardigheden/publiceren/{id}', 'BezienswaardigheidController@publicerenBezienswaardigheid');
	Route::get('admin/bezienswaardigheden/offlineHalen/{id}', 'BezienswaardigheidController@offlineHalenBezienswaardigheid');
	
});


//Administratieroutes die de Admin mag uitvoeren
Route::group(['middleware' => 'rol:Administrator'], function () {
	//Gebruikers routes
	Route::get('admin/gebruikers/wijzig/{id}', 'AdminController@openGebruiker');
	Route::post('admin/gebruikers/wijzig/{id}', 'AdminController@wijzigGebruiker');
	Route::get('admin/gebruikers/verwijder/{id}', 'AdminController@verwijderGebruiker');
});


//Inlog routes
Route::get('logout','Auth\LoginController@logout');
Route::get('profiel','ProfielController@index');
Route::post('profiel/wijzigen','ProfielController@wijzigen');
Route::post('profiel/wachtwoordwijzigen','ProfielController@wachtwoordWijzigen');
Route::get('profiel/verwijderen','ProfielController@verwijderen');