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

	Route::resource('tiposContrato','tiposContratoController');
	Route::get('tiposContrato/{id}/destroy',[
		'uses' => 'tiposContratoController@destroy',
		'as' => 'tiposContrato.destroy'
	]);

	Route::get('tiposContrato/{id}/indefinido',[
		'uses' => 'tiposContratoController@indefinido',
		'as' => 'tiposContrato.indefinido'
	]);

	Route::resource('listasDesplegables','listasDesplegablesController');


	Route::resource('nivelesEstudio','nivelesEstudioController');
	Route::get('nivelesEstudio/{id}/destroy',[
		'uses' => 'nivelesEstudioController@destroy',
		'as' => 'nivelesEstudio.destroy'
	]);

	Route::resource('areasEstudio','areasEstudioController');
	Route::get('areasEstudio/{id}/destroy',[
		'uses' => 'areasEstudioController@destroy',
		'as' => 'areasEstudio.destroy'
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

	Route::resource('contratos','contratosController');
	Route::get('contratos/{id}/destroy',[
		'uses' => 'contratosController@destroy',
		'as' => 'contratos.destroy'
	]);
	Route::post('contratos/createAjax',[
		'uses' => 'contratosController@createAjax',
		'as' => 'contratos.createAjax'
	]);
	Route::get('contratos/{id}/showAjax',[
		'uses' => 'contratosController@showAjax',
		'as' => 'contratos.showAjax'
	]);
	Route::get('contratos/{id}/destroyAjax',[
		'uses' => 'contratosController@destroyAjax',
		'as' => 'contratos.destroyAjax'
	]);

	Route::resource('formaciones','formacionesController');
	Route::get('formaciones/{id}/destroy',[
		'uses' => 'formacionesController@destroy',
		'as' => 'formaciones.destroy'
	]);
	Route::get('formaciones/{id}/nivelFormacionAjax',[
		'uses' => 'formacionesController@nivelFormacionAjax',
		'as' => 'formaciones.nivelFormacionAjax'
	]);
	Route::post('formaciones/crearFormacionAjax',[
		'uses' => 'formacionesController@crearFormacionAjax',
		'as' => 'formaciones.crearFormacionAjax'
	]);

	Route::resource('restriccionesMedicas','restriccionesMedicasController');
	Route::post('restriccionesMedicas/createAjax',[
		'uses' => 'restriccionesMedicasController@createAjax',
		'as' => 'restriccionesMedicas.createAjax'
	]);
	Route::get('restriccionesMedicas/{id}/destroyAjax',[
		'uses' => 'restriccionesMedicasController@destroyAjax',
		'as' => 'restriccionesMedicas.destroyAjax'
	]);

	Route::resource('examenes','examenesController');
	Route::get('examenes/{id}/destroy',[
		'uses' => 'examenesController@destroy',
		'as' => 'examenes.destroy'
	]);

});