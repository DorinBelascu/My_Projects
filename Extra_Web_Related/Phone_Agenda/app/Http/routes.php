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

// Persoane
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::post('modal-add-persoana',[
	'as'   => 'modal-add-persoana',
	'uses' => 'PersoaneController@addPersoanaToDatabase',
]);

Route::post('sterge-persoana',[
	'as'   => 'sterge-persoana',
	'uses' => 'PersoaneController@stergePersoana',
]);

Route::post('editeaza-persoana',[
	'as'   => 'editeaza-persoana',
	'uses' => 'PersoaneController@editeazaPersoana',
]);

Route::post('save-persoane-photo-upload]{id}',[
	'as'   => 'save-persoane-photo-upload',
	'uses' => 'PersoaneController@adaugaPoza',
]);

Route::get('test-image', function()
{
	$path  = Config::get('images.storage');
	$sizes = Config::get('images.sizes');
	
	$img = Image::make(storage_path() . '/photos/test.jpg');
	$min = min( $img->width(), $img->height() );
	$img->crop($min, $min)->save( $path . '/test-square.jpg');
	echo '<pre>';
	// var_dump();

    // $img = Image::make(storage_path().'/photos/test.jpg')->resize(300, 200);

    // $img->save(storage_path().'/photos/altceva.jpg');

    // return $img->response('jpg');
    foreach ($sizes as $key => $value) 
    {
    	$img = Image::make(storage_path() . '/photos/test-square.jpg');
    	$img->resize($value, $value , 
    		function ($constraint)
    		{
        		$constraint->aspectRatio();
        		$constraint->upsize();
    		}
    	)
    	// ->crop($value, $value)
    	->save($path . '/test-' . $key .'.jpg');
    }
});

// End Persoane

// Grupuri
Route::post('adauga-grup',[
	'as'   => 'adauga-grup',
	'uses' => 'GrupuriController@adaugaGrup',
]);

Route::post('sterge-grup',[
	'as'   => 'sterge-grup',
	'uses' => 'GrupuriController@stergeGrup',
]);

Route::post('editeza-grup',[
	'as'   => 'editeza-grup',
	'uses' => 'GrupuriController@editeazaGrup',
]);

Route::post('gaseste-grup',[
	'as'   => 'gaseste-grup',
	'uses' => 'GrupuriController@gasesteGrup',
]);
// End Grupuri