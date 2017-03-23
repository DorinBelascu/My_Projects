<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
	'as'    => '/',
 	'uses'  => 'WelcomeController@index',
]);

Route::get('home', 'HomeController@index');

//Zboruri
Route::post('adauga-zbor',[
	'as'   => 'adauga-zbor',
	'uses' => 'ZboruriController@addZborToDatabase',
]);

Route::post('adauga-angajat',[
	'as'   => 'adauga-angajat',
	'uses' => 'AngajatiController@addAngajatToDatabase',
]);

Route::post('adauga-aeronava',[
	'as'   => 'adauga-aeronava',
	'uses' => 'AeronaveController@addAeronavaToDatabase',
]);

Route::post('adauga-certificare',[
	'as'   => 'adauga-certificare',
	'uses' => 'CertificariController@addCertificareToDatabase',
]);


//Interogari
Route::post('interogare-0',[
	'as'   => 'interogare-0',
	'uses' => 'InterogariController@doInterogation0ToDatabase',
]);

Route::post('interogare-1',[
	'as'   => 'interogare-1',
	'uses' => 'InterogariController@doInterogation1ToDatabase',
]);

Route::post('interogare-2',[
	'as'   => 'interogare-2',
	'uses' => 'InterogariController@doInterogation2ToDatabase',
]);

Route::post('interogare-3',[
	'as'   => 'interogare-3',
	'uses' => 'InterogariController@doInterogation3ToDatabase',
]);

Route::post('interogare-4',[
	'as'   => 'interogare-4',
	'uses' => 'InterogariController@doInterogation4ToDatabase',
]);

Route::post('interogare-5',[
	'as'   => 'interogare-5',
	'uses' => 'InterogariController@doInterogation5ToDatabase',
]);

Route::post('interogare-6',[
	'as'   => 'interogare-6',
	'uses' => 'InterogariController@doInterogation6ToDatabase',
]);

Route::post('interogare-7',[
	'as'   => 'interogare-7',
	'uses' => 'InterogariController@doInterogation7ToDatabase',
]);

Route::post('interogare-8',[
	'as'   => 'interogare-8',
	'uses' => 'InterogariController@doInterogation8ToDatabase',
]);
//End Interogari
