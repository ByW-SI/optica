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

Route::resource('provedores.direccionfisica','Provedor\ProvedorDireccionFisicaController');
Route::resource('provedores.datosgenerales','Provedor\ProvedorDatosGeneralesController', ['except'=>'show']);
Route::resource('provedores.contacto','Provedor\ProvedorContactoController');
Route::resource('provedores.crm','Provedor\ProvedorCRMController');
//----------------------------------------------------------
Route::get('prueba','Provedor\ProvedorDireccionFisicaController@prueba');

// Route::get('busqueda','Personal\PersonalController@busqueda');
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


Route::resource('formacontactos','FormaContacto\FormaContactoController');

// Route::resource('clientes','Personal\PersonalController');
// Route::resource('clientes.direccionfisica','Provedor\ProvedorDireccionFisicaController');
// Route::resource('clientes.contacto','Personal\PersonalContactoController');
// Route::resource('clientes.datosgenerales','Personal\PersonalDatosGeneralesController',['except'=>'show']);

Route::get('prueba','Provedor\ProvedorDireccionFisicaController@prueba');
// Route::resource('empleados','Empleado\EmpleadoController');
// Route::resource('empleados.datoslaborales','Empleado\EmpleadosDatosLabController');
// Route::resource('empleados.estudios','Empleado\EmpleadosEstudiosController');
// Route::resource('empleados.emergencias','Empleado\EmpleadosEmergenciasController');
// Route::resource('empleados.vacaciones','Empleado\EmpleadosVacacionesController');
// Route::resource('empleados.faltas','Empleado\EmpleadosFaltasAdministrativasController');
// Route::resource('contratos','Precargas\TipoContratoController');
// Route::resource('bajas','Precargas\TipoBajaController');

// Route::get('/home', 'HomeController@index')->name('home');
// //----------  13/DIC/2017  ---------------------
// Route::get('rh',function(){

// 	return View::make('rhpersonal.create');
// });

// //-----------------------------------------------------


// Route::resource('formacontactos','FormaContacto\FormaContactoController');

// // Route::resource('clientes','Personal\PersonalController');
// // Route::resource('clientes.direccionfisica','Provedor\ProvedorDireccionFisicaController');
// // Route::resource('clientes.contacto','Personal\PersonalContactoController');
// // Route::resource('clientes.datosgenerales','Personal\PersonalDatosGeneralesController', ['except'=>'show']);

// // Route::get('prueba','Provedor\ProvedorDireccionFisicaController@prueba');
// //-----------------------------------------------------
// Route::resource('provedores','Provedor\ProvedorController');
// Route::get('buscarprovedor','Provedor\ProvedorController@buscar');
// Route::resource('provedores.direccionfisica','Provedor\ProvedorDireccionFisicaController');
// Route::resource('provedores.datosgenerales','Provedor\ProvedorDatosGeneralesController', ['except'=>'show']);
// Route::resource('provedores.contacto','Provedor\ProvedorContactoController');
// Route::resource('provedores.crm','Provedor\ProvedorCRMController');
// //----------------------------------------------------------
// Auth::routes();