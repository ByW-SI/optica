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


// CONVENIOS
Route::resource('convenios','Convenio\ConvenioController');
Route::resource('convenios.direccionfiscal','Convenio\ConvenioDireccionFiscalController');
Route::resource('convenios.contactos','Convenio\ConvenioContactoController');
Route::resource('convenios.tipoconvenios','Convenio\ConvenioTipoConvenioController');
// Route::resource('convenios.tipoconvenios','Convenio\ConvenioTipoConvenioController');

//----------------------------------------------------------



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

Route::get('consulta',function(){

	return View::make('empleadoconsulta.consulta');
});
Route::get('bonos',function(){

	return View::make('Empleadobonos.bonos');
});
Route::get('comision',function(){

	return View::make('Empleadobonos.comision');
});

Route::get('productos',function(){

	return View::make('Productos.create');
});
Route::get('ocul',function(){

	return View::make('Paciente.aux_create');
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
// Route::get('gastos.create','Gasto\GastoController@create');

Route::resource('sucursales','Sucursal\SucursalController');
Route::get('sucursales.create','Sucursal\SucursalController@create');
Route::get('sucursales.index','Sucursal\SucursalController@index');

Route::resource('sucursal','Empleado\EmpleadoSucursalController');
//---------------------------------------------------------------------------
Route::resource('areas','Area\AreaController', ['except'=>'show']);
Route::resource('puestos','Puesto\PuestoController', ['except'=>'show']);
Route::resource('bancos','Banco\BancoController', ['except'=>'show']);
//---------------------------------------------------------------------------
Route::resource('almacens','Almacen\AlmacenController');
Route::get('almacens.create','Almacen\AlmacenController@create');
Route::get('almacens.index','Almacen\AlmacenController@index');

Route::resource('almacen','Empleado\EmpleadoAlmacenController');
//----------------------------------------------------
// ruta de funcion ajax para obtener las precargas
Route::get('getareas','Area\AreaController@getAreas');
Route::get('getcontratos','Precargas\TipoContratoController@getContratos');
Route::get('getbajas','Precargas\TipoBajaController@getBajas');
Route::get('getpuestos','Puesto\PuestoController@getPuestos');
Route::get('getsucursal','Sucursal\SucursalController@getSucursal');
Route::get('getalmacen','Almacen\AlmacenController@getAlmacen');
Route::get('getbancos','Banco\BancoController@getBancos');
Route::get('getgiros','Giro\GiroController@getGiros');
//---------------------------------------------------------
// *********** PACIENTES *********************************//
Route::resource('pacientes','Paciente\PacienteController');
Route::resource('pacientes.datosgenerales','Paciente\PacientesDatosGeneralesController');
Route::resource('pacientes.historialmedico','Paciente\PacienteHistorialMedicoController');
Route::resource('pacientes.historialocular','Paciente\PacienteHistorialOcularController');
Route::resource('pacientes.tutor','Paciente\TutorController');
Route::get('buscarpaciente','Paciente\PacienteController@buscar');
//------------------------------------------------------------




