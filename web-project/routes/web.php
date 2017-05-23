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

Route::get('/', function () {
    return view('welkom');
});

Route::get('/home', 'HomeController@index');
Route::get('test', 'AdminController@test');

//Administratie routes die iedereen mag uitvoeren
Route::group(['middleware' => 'rol:Administrator,Approver,Editor'], function () {
	Route::get('admin', 'AdminController@index');

	//Gebruiker routes
	Route::get('admin/gebruikers', 'AdminController@gebruikersPaginaOpenen');
	Route::get('admin/gebruikers/wijzig/{id}', 'AdminController@openGebruiker');
	Route::post('admin/gebruikers/wijzig/{id}', 'AdminController@wijzigGebruiker');
	Route::post('admin/gebruikers/zoeken','AdminController@zoekGebruikerViaNaam');

	//Nieuwsitems routes
	Route::get('admin/nieuwsitems','NieuwsitemController@index');
	Route::get('admin/nieuwsitems/toevoegen','NieuwsitemController@openToevoegenNieuwsitem');
	Route::post('admin/nieuwsitems/toevoegen','NieuwsitemController@voegNieuwsitemToe');
	Route::get('admin/nieuwsitems/wijzig/{id}', 'NieuwsitemController@openWijzigingNieuwsitem');
	Route::post('admin/nieuwsitems/wijzig/{id}', 'NieuwsitemController@wijzigNieuwsitem');
	Route::get('admin/nieuwsitems/open/{id}', 'NieuwsitemController@openNieuwsitem');
});

//Administratieroutes die Approver en Admin mag uitvoeren
Route::group(['middleware' => 'rol:Administrator,Approver'], function () {	
	
	//Gebruikers routes
	Route::get('admin/gebruikers/verwijder/{id}', 'AdminController@verwijderGebruiker');

	//Nieuwsitems routes
	Route::get('admin/nieuwsitems/verwijder/{id}', 'NieuwsitemController@verwijderNieuwsitem');
	Route::get('admin/nieuwsitems/goedkeuren/{id}', 'NieuwsitemController@goedkeurenNieuwsitem');
	Route::get('admin/nieuwsitems/afwijzen/{id}', 'NieuwsitemController@afwijzenNieuwsitem');
});



//Inlog routes
Route::get('logout','Auth\LoginController@logout');

Route::get('profiel','ProfielController@index');
Route::post('profiel/wijzigen','ProfielController@wijzigen');
Route::post('profiel/wachtwoordwijzigen','ProfielController@wachtwoordWijzigen');
Route::get('profiel/verwijderen','ProfielController@verwijderen');
