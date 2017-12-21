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
Route::get('sucursales',function(){

	return View::make('sucursales.sucursales');
});
Route::get('gastos',function(){

	return View::make('gastos.gastos');
});
Route::get('consulta',function(){

	return View::make('empleadoconsulta.consulta');
});
Route::get('bonos',function(){

	return View::make('Empleadobonos.bonos');
});
Route::get('comision',function(){

	return View::make('Empleadobonos.comision');
});
//-----------------------------------------------------
Route::resource('provedores','Provedor\ProvedorController');

Route::resource('formacontactos','FormaContacto\FormaContactoController');

Route::resource('clientes','Personal\PersonalController');
Route::resource('clientes.direccionfisica','Provedor\ProvedorDireccionFisicaController');
Route::resource('clientes.contacto','Personal\PersonalContactoController');
Route::resource('clientes.datosgenerales','Personal\PersonalDatosGeneralesController',['except'=>'show']);

Route::get('prueba','Provedor\ProvedorDireccionFisicaController@prueba');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//----------  13/DIC/2017  ---------------------
Route::get('rh',function(){

	return View::make('rhpersonal.create');
});

//-----------------------------------------------------


Route::resource('formacontactos','FormaContacto\FormaContactoController');

Route::resource('clientes','Personal\PersonalController');
Route::resource('clientes.direccionfisica','Provedor\ProvedorDireccionFisicaController');
Route::resource('clientes.contacto','Personal\PersonalContactoController');
Route::resource('clientes.datosgenerales','Personal\PersonalDatosGeneralesController', ['except'=>'show']);

Route::get('prueba','Provedor\ProvedorDireccionFisicaController@prueba');
//-----------------------------------------------------
Route::resource('provedores','Provedor\ProvedorController');
Route::get('buscarprovedor','Provedor\ProvedorController@buscar');
Route::resource('provedores.direccionfisica','Provedor\ProvedorDireccionFisicaController');
Route::resource('provedores.datosgenerales','Provedor\ProvedorDatosGeneralesController', ['except'=>'show']);
Route::resource('provedores.contacto','Provedor\ProvedorContactoController');
Route::resource('provedores.crm','Provedor\ProvedorCRMController');
//----------------------------------------------------------