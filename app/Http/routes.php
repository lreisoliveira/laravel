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

#####################################################################################
# ROTAS PARA SERVER
#####################################################################################

Route::group(array('before'=>'auth'), function()
{
	// rota para server: chamando verbo get
	Route::get('server/rest', 'ServerController@get');
	
	// rota para server: chamando verbo post
	Route::post('server/rest', 'ServerController@create');
	
	// rota para server: chamando verbo put
	Route::put('server/rest', 'ServerController@update');
	
	// rota para server: chamando verbo delete
	Route::delete('server/rest', 'ServerController@delete');
	
});


#####################################################################################
# ROTAS PARA CLIENT
#####################################################################################

Route::get('/posts', 'PostController@index');

// rota para client: chamando verbo get com pedido json
Route::get('client-rest/get.json', 'ClientController@index');

// rota para client: chamando verbo get com pedido xml
Route::get('client-rest/get.xml', 'ClientController@index');

/*Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);*/
// Route::get('home', 'HomeController@index');

Route::get('/', 'WelcomeController@index');

Route::get('/testando', 'WelcomeController@teste');


Route::get('/teste', function(){
	echo 'Exibindo a URL: '.Config::get('app.urls'). '<br /> Para a environment: '.app()->environment();
});



	
