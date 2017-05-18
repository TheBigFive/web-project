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

Route::get('/test', 'Controller@test');

Route::get('/home', 'HomeController@index');

//Admin routes
Route::get('/admin', 'AdminController@index');
Route::get('/admin/gebruikers', 'AdminController@gebruikersPaginaOpenen');
Route::get('/admin/gebruikers/verwijder/{id}', 'AdminController@verwijderGebruiker');
Route::get('/admin/gebruikers/wijzig/{id}', 'AdminController@openGebruiker');
Route::post('/admin/gebruikers/wijzig/{id}', 'AdminController@wijzigGebruiker');


//Inlog routes
Route::get('logout','Auth\LoginController@logout');
