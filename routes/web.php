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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'configuracion'],function(){

	Route::resource('centroTrabajo','centroTrabajoController');
	Route::get('centroTrabajo/{id}/destroy',[
		'uses' => 'centroTrabajoController@destroy',
		'as' => 'centroTrabajo.destroy'
	]);

	Route::resource('nivelRiesgos','nivelRiesgosController');
	Route::get('nivelRiesgos/{id}/destroy',[
		'uses' => 'nivelRiesgosController@destroy',
		'as' => 'nivelRiesgos.destroy'
	]);

	Route::resource('tiposDocumento','tiposDocumentoController');
	Route::get('tiposDocumento/{id}/destroy',[
		'uses' => 'tiposDocumentoController@destroy',
		'as' => 'tiposDocumento.destroy'
	]);

	Route::resource('cargos','cargosController');
	Route::get('cargos/{id}/destroy',[
		'uses' => 'cargosController@destroy',
		'as' => 'cargos.destroy'
	]);

	Route::resource('eps','epsController');
	Route::get('eps/{id}/destroy',[
		'uses' => 'epsController@destroy',
		'as' => 'eps.destroy'
	]);

	Route::resource('arl','arlController');
	Route::get('arl/{id}/destroy',[
		'uses' => 'arlController@destroy',
		'as' => 'arl.destroy'
	]);

	Route::resource('fondosPensiones','fondosPensionesController');
	Route::get('fondosPensiones/{id}/destroy',[
		'uses' => 'fondosPensionesController@destroy',
		'as' => 'fondosPensiones.destroy'
	]);

	Route::resource('fondosCesantias','fondosCesantiasController');
	Route::get('fondosCesantias/{id}/destroy',[
		'uses' => 'fondosCesantiasController@destroy',
		'as' => 'fondosCesantias.destroy'
	]);

});

Route::group(['prefix'=>'administracion'],function(){

	Route::resource('empleados','empleadosController');
	Route::get('empleados/{id}/destroy',[
		'uses' => 'empleadosController@destroy',
		'as' => 'empleados.destroy'
	]);
	Route::post('empleados/cargarRiesgo',[
		'uses' => 'empleadosController@cargarRiesgo',
		'as' => 'empleados.cargarRiesgo'
	]);

});