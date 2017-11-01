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
    return view('auth.login');
});

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index');

Route::group(['prefix'=>'configuracion','middleware' => 'auth'],function(){

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

	Route::resource('usuarios','usuariosController');
	Route::get('usuarios/{id}/destroy',[
		'uses' => 'usuariosController@destroy',
		'as' => 'usuarios.destroy'
	]);

});

Route::group(['prefix'=>'administracion','middleware' => 'auth'],function(){

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
	Route::post('formaciones/createAjax',[
		'uses' => 'formacionesController@createAjax',
		'as' => 'formaciones.createAjax'
	]);
	Route::get('formaciones/{id}/showAjax',[
		'uses' => 'formacionesController@showAjax',
		'as' => 'formaciones.showAjax'
	]);
	Route::get('formaciones/{id}/destroyAjax',[
		'uses' => 'formacionesController@destroyAjax',
		'as' => 'formaciones.destroyAjax'
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
	Route::get('restriccionesMedicas/{id}/showAjax',[
		'uses' => 'restriccionesMedicasController@showAjax',
		'as' => 'restriccionesMedicas.showAjax'
	]);

	Route::resource('examenes','examenesController');
	Route::get('examenes/{id}/destroy',[
		'uses' => 'examenesController@destroy',
		'as' => 'examenes.destroy'
	]);
	Route::post('examenes/createAjax',[
		'uses' => 'examenesController@createAjax',
		'as' => 'examenes.createAjax'
	]);
	Route::get('examenes/{id}/showAjax',[
		'uses' => 'examenesController@showAjax',
		'as' => 'examenes.showAjax'
	]);
	Route::get('examenes/{id}/destroyAjax',[
		'uses' => 'examenesController@destroyAjax',
		'as' => 'examenes.destroyAjax'
	]);

	Route::resource('tiposVacaciones','tiposVacacionesController');
	Route::get('tiposVacaciones/{id}/destroy',[
		'uses' => 'tiposVacacionesController@destroy',
		'as' => 'tiposVacaciones.destroy'
	]);

	Route::resource('vacaciones','vacacionesController');
	Route::get('vacaciones/{id}/destroy',[
		'uses' => 'vacacionesController@destroy',
		'as' => 'vacaciones.destroy'
	]);
	Route::post('vacaciones/createAjax',[
		'uses' => 'vacacionesController@createAjax',
		'as' => 'vacaciones.createAjax'
	]);
	Route::get('vacaciones/{id}/showAjax',[
		'uses' => 'vacacionesController@showAjax',
		'as' => 'vacaciones.showAjax'
	]);
	Route::get('vacaciones/{id}/destroyAjax',[
		'uses' => 'vacacionesController@destroyAjax',
		'as' => 'vacaciones.destroyAjax'
	]);

	Route::resource('tiposSST','tiposSSTController');
	Route::get('tiposSST/{id}/destroy',[
		'uses' => 'tiposSSTController@destroy',
		'as' => 'tiposSST.destroy'
	]);


	Route::resource('causasSST','causasSSTController');
	Route::get('causasSST/{id}/destroy',[
		'uses' => 'causasSSTController@destroy',
		'as' => 'causasSST.destroy'
	]);

	Route::resource('SST','SSTController');
	Route::get('SST/{id}/destroy',[
		'uses' => 'SSTController@destroy',
		'as' => 'SST.destroy'
	]);
	Route::post('SST/createAjax',[
		'uses' => 'SSTController@createAjax',
		'as' => 'SST.createAjax'
	]);
	Route::get('SST/{id}/showAjax',[
		'uses' => 'SSTController@showAjax',
		'as' => 'SST.showAjax'
	]);
	Route::get('SST/{id}/destroyAjax',[
		'uses' => 'SSTController@destroyAjax',
		'as' => 'SST.destroyAjax'
	]);

	Route::resource('adjuntos','adjuntosController');
	Route::get('adjuntos/{id}/destroy',[
		'uses' => 'adjuntosController@destroy',
		'as' => 'adjuntos.destroy'
	]);
	Route::post('adjuntos/createAjax',[
		'uses' => 'adjuntosController@createAjax',
		'as' => 'adjuntos.createAjax'
	]);
	Route::get('adjuntos/{id}/showAjax',[
		'uses' => 'adjuntosController@showAjax',
		'as' => 'adjuntos.showAjax'
	]);
	Route::get('adjuntos/{id}/destroyAjax',[
		'uses' => 'adjuntosController@destroyAjax',
		'as' => 'adjuntos.destroyAjax'
	]);

});

Route::group(['prefix'=>'matrices','middleware' => 'auth'],function(){

	Route::resource('roles','rolesController');
	Route::get('roles/{id}/destroy',[
		'uses' => 'rolesController@destroy',
		'as' => 'roles.destroy'
	]);
	Route::post('roles/matriz',[
		'uses' => 'rolesController@matriz',
		'as' => 'roles.matriz'
	]);
});