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
Route::post('cita','Paciente\PacienteCitaController@store');
Route::post('crm','Paciente\PacienteCrmController@store');
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
Route::get('buscarcontrato','Precargas\TipoContratoController@buscar');
Route::get('buscarbaja','Precargas\TipoBajaController@buscar');
Route::get('buscararea','Area\AreaController@buscar');
Route::get('buscarpuesto','Puesto\PuestoController@buscar');
Route::get('buscarbanco','Banco\BancoController@buscar');
Route::get('buscargiro','Giro\GiroController@buscar');
Route::get('buscarformacontacto','FormaContacto\FormaContactoController@buscar');

Route::get('/', function () {
	return redirect()->route('login');
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
Route::get('getcontacto','FormaContacto\FormaContactoController@getContactos');
//---------------------------------------------------------
// *********** PACIENTES *********************************//
Route::resource('pacientes','Paciente\PacienteController');
Route::resource('pacientes.datosgenerales','Paciente\PacientesDatosGeneralesController');
Route::resource('pacientes.historialmedico','Paciente\PacienteHistorialMedicoController');
Route::resource('pacientes.historialocular','Paciente\PacienteHistorialOcularController');
Route::resource('pacientes.anteojos','Paciente\PacienteAnteojoController');
Route::resource('pacientes.tutor','Paciente\TutorController');
Route::resource('pacientes.citas','Paciente\PacienteCitaController');
Route::resource('pacientes.crm','Paciente\PacienteCrmController');
Route::get('buscarpaciente','Paciente\PacienteController@buscar');

Route::resource('pacientes.ortopedias','Paciente\PacienteHistorialOrtopedicoController', ['only'=>['store','destroy']]);
//Route::post('citas','Paciente\PacienteCitaController@citas');
//------------------------------------------------------------

Route::get('/lentillas', function () {
    return view('lentillas.create');
});

Route::get('/home', function () {
	if(Auth::check()){
    	return view('welcome');

	}else{
		return redirect()->route('login');
	}
})->name('home');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
