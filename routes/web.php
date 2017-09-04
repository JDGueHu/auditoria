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

});

Route::group(['prefix'=>'administracion'],function(){

	Route::resource('empleados','empleadosController');
	Route::get('empleados/{id}/destroy',[
		'uses' => 'empleadosController@destroy',
		'as' => 'empleados.destroy'
	]);

});