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

Route::resource('giros','Giro\GiroController', ['except'=>'show']);
Route::resource('formacontactos','FormaContacto\FormaContactoController');
Route::resource('provedores','Provedor\ProvedorController');
Route::get('provedores.create','Provedor\ProvedorController@create');
Route::get('provedores.datosgenerales.show', 'Provedor\ProvedorDatosGeneralesController@show');
Route::resource('provedores.direccionfisica','Provedor\ProvedorDireccionFisicaController');
Route::resource('provedores.datosgenerales','Provedor\ProvedorDatosGeneralesController');
Route::resource('provedores.contacto','Provedor\ProvedorContactoController');
Route::resource('provedores.crm','Provedor\ProvedorCRMController');
Route::resource('pacientes','Paciente\PacienteController');
//----------------------------------------------------------
Route::get('prueba','Provedor\ProvedorDireccionFisicaController@prueba');
Route::resource('empleados','Empleado\EmpleadoController');
Route::resource('empleados.datoslaborales','Empleado\EmpleadosDatosLabController');
Route::resource('empleados.estudios','Empleado\EmpleadosEstudiosController');
Route::resource('empleados.emergencias','Empleado\EmpleadosEmergenciasController');
Route::resource('empleados.vacaciones','Empleado\EmpleadosVacacionesController');
Route::resource('empleados.faltas','Empleado\EmpleadosFaltasAdministrativasController');
Route::resource('contratos','Precargas\TipoContratoController');
Route::resource('bajas','Precargas\TipoBajaController');

/* RUTAS DE BUSQUEDAS*/
Route::get('buscarempleado','Empleado\EmpleadoController@buscar');
Route::get('buscarproveedor','Provedor\ProvedorController@buscar');



Route::get('/', function () {
    return view('welcome');
});
Route::get('sucursaleses',function(){

	return View::make('sucursales.sucursales');
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


Route::resource('formacontactos','FormaContacto\FormaContactoController');
Route::get('prueba','Provedor\ProvedorDireccionFisicaController@prueba');
//-----------------------------------
Route::get('citas',function(){

	return View::make('citas.create');
});
//--------------------------------------------------------------------
Route::resource('gastos','Gasto\GastoController', ['except'=>'show']);
Route::resource('gastos.create','Gasto\GastoController@create');

Route::resource('sucursales','Sucursal\SucursalController');
Route::get('sucursales.create','Sucursal\SucursalController@create');
Route::get('sucursales.datosgenerales.show', 'Sucursal\SucursalDatosGeneralesController@show');
Route::resource('sucursales.direccionfisica','Sucursal\SucursalDireccionFisicaController');
Route::resource('sucursales.datosgenerales','Sucursal\SucursalDatosGeneralesController');
Route::resource('sucursales.contacto','Sucursal\SucursalContactoController');
Route::resource('sucursales.crm','Sucursal\SucursalCRMController');
