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

	return View::make('Sucursales.sucursales');
});
Route::get('gastos',function(){

	return View::make('Gastos.gastos');
});
Route::get('consulta',function(){

	return View::make('Empleadoconsulta.consulta');
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
Route::resource('clientes.datosgenerales','Personal\PersonalDatosGeneralesController', ['except'=>'show']);

Route::get('prueba','Provedor\ProvedorDireccionFisicaController@prueba');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
