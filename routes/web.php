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
	return redirect()->route('login');
});

Route::get('/home', function () {
	if(Auth::check())
    	return view('welcome');
	return redirect()->route('login');
})->name('home');

Route::get('/denegado',function(){
	return view('errors.denegado');
})->name('denegado');

// RECURSOS HUMANOS
Route::resource('empleados', 'Empleado\EmpleadoController');
Route::resource('empleados.datoslaborales', 'Empleado\EmpleadosDatosLabController');
Route::resource('empleados.estudios', 'Empleado\EmpleadosEstudiosController');
Route::resource('empleados.emergencias', 'Empleado\EmpleadosEmergenciasController');
Route::resource('empleados.vacaciones', 'Empleado\EmpleadosVacacionesController');
Route::resource('empleados.faltas', 'Empleado\EmpleadosFaltasAdministrativasController');

// CRM
// Route::post('crm', 'Paciente\PacienteCrmController@store');
Route::resource('crms', 'Paciente\PacienteCrmController');

// PACIENTES
Route::post('cita', 'Paciente\PacienteCitaController@store');
Route::get('fecha','Paciente\PacienteCrmController@porFecha')->name('fecha');
Route::resource('pacientes', 'Paciente\PacienteController');
Route::resource('pacientes.datosgenerales', 'Paciente\PacientesDatosGeneralesController');
Route::resource('pacientes.historialmedico', 'Paciente\PacienteHistorialMedicoController');
Route::resource('pacientes.historialocular', 'Paciente\PacienteHistorialOcularController');
Route::resource('pacientes.anteojos', 'Paciente\PacienteAnteojoController');
Route::resource('pacientes.tutores', 'Paciente\TutorController')->except(['create', 'store', 'show']);
Route::get('pacientes/{paciente}/tutores/{tutor}/select', 'Paciente\TutorController@select')->name('pacientes.tutores.select');
Route::post('pacientes/{paciente}/tutores/{tutor}', 'Paciente\TutorController@bind')->name('pacientes.tutores.bind');
Route::resource('tutores', 'Tutor\TutorController');
Route::resource('pacientes.citas', 'Paciente\PacienteCitaController');
Route::resource('pacientes.crms', 'Paciente\PacienteCrmController');
Route::resource('pacientes.ortopedias', 'Paciente\PacienteHistorialOrtopedicoController');

// SEGURIDAD
Route::resource('perfil', 'Perfil\PerfilController');
Route::resource('usuario', 'Usuario\UsuarioController');

// PROVEEDORES
Route::resource('provedores', 'Provedor\ProvedorController');
Route::get('provedores.create', 'Provedor\ProvedorController@create');
Route::get('provedores.datosgenerales.show', 'Provedor\ProvedorDatosGeneralesController@show');
Route::resource('provedores.direccionfisica', 'Provedor\ProvedorDireccionFisicaController');
Route::resource('provedores.datosgenerales', 'Provedor\ProvedorDatosGeneralesController');
Route::resource('provedores.contacto', 'Provedor\ProvedorContactoController');
Route::resource('provedores.datosbancarios', 'Provedor\ProveedorDatosBancariosController');

// SUCURSALES
Route::resource('sucursales', 'Sucursal\SucursalController');
Route::get('sucursales.create', 'Sucursal\SucursalController@create');
Route::get('sucursales.index', 'Sucursal\SucursalController@index');
Route::resource('sucursal', 'Empleado\EmpleadoSucursalController');

// PRECARGAS
Route::resource('giros', 'Giro\GiroController', ['except' => 'show']);
Route::resource('formacontactos', 'FormaContacto\FormaContactoController');
Route::resource('contratos', 'Precargas\TipoContratoController');
Route::resource('bajas', 'Precargas\TipoBajaController');
Route::resource('formacontactos', 'FormaContacto\FormaContactoController');
Route::resource('areas', 'Area\AreaController', ['except' => 'show']);
Route::resource('puestos', 'Puesto\PuestoController', ['except' => 'show']);
Route::resource('bancos', 'Banco\BancoController', ['except' => 'show']);

// CONVENIOS
Route::resource('convenios', 'Convenio\ConvenioController', ['except' => 'destroy']);
Route::resource('convenios.direccionfiscal', 'Convenio\ConvenioDireccionFiscalController', ['except' => 'show', 'destroy']);
Route::resource('convenios.contactos', 'Convenio\ConvenioContactoController');
Route::resource('convenios.tipoconvenios', 'Convenio\ConvenioTipoConvenioController');
// Route::resource('convenios.tipoconvenios', 'Convenio\ConvenioTipoConvenioController');

// EXCEL
Route::get('excel/pacientes', 'Excel\PacienteExcel@index')->name('excel.pacientes.index');
Route::post('excel/pacientes/upload', 'Excel\PacienteExcel@upload')->name('excel.pacientes.upload');

// BÚSQUEDAS
Route::get('buscarpaciente', 'Paciente\PacienteController@buscar');
Route::get('buscarempleado', 'Empleado\EmpleadoController@buscar');
Route::get('buscarproveedor', 'Provedor\ProvedorController@buscar');
Route::get('buscarcontrato', 'Precargas\TipoContratoController@buscar');
Route::get('buscarbaja', 'Precargas\TipoBajaController@buscar');
Route::get('buscararea', 'Area\AreaController@buscar');
Route::get('buscarpuesto', 'Puesto\PuestoController@buscar');
Route::get('buscarbanco', 'Banco\BancoController@buscar');
Route::get('buscargiro', 'Giro\GiroController@buscar');
Route::get('buscarformacontacto', 'FormaContacto\FormaContactoController@buscar');
Route::get('buscarProducto', 'Producto\ProductoController@buscar');
Route::get('buscarProducto2', 'Inventario\InventarioController@buscar2');
Route::get('buscarProducto3', 'Precio\PrecioController@buscar2');
Route::get('buscarInventario', 'Inventario\InventarioController@buscar');
Route::get('buscarPrecio', 'Precio\PrecioController@buscar');
Route::get('buscarHistorial', 'Historial\HistorialController@buscar');
Route::get('buscarCRM', 'Paciente\PacienteCrmController@buscar')->name('crms.buscar');
Route::get('buscarPaciente', 'Paciente\PacienteCrmController@pacientes')->name('crms.pacientes');

// AJAX
Route::get('getareas', 'Area\AreaController@getAreas');
Route::get('getcontratos', 'Precargas\TipoContratoController@getContratos');
Route::get('getbajas', 'Precargas\TipoBajaController@getBajas');
Route::get('getpuestos', 'Puesto\PuestoController@getPuestos');
Route::get('getsucursal', 'Sucursal\SucursalController@getSucursal');
Route::get('getalmacen', 'Almacen\AlmacenController@getAlmacen');
Route::get('getbancos', 'Banco\BancoController@getBancos');
Route::get('getgiros', 'Giro\GiroController@getGiros');
Route::get('getcontacto', 'FormaContacto\FormaContactoController@getContactos');
Route::get('getconvenio', 'Convenio\ConvenioTipoConvenioController@getConvenios');

// SESSION
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

// PRODUCTOS
Route::resource('productos', 'Producto\ProductoController', ['except' => 'destroy']);
Route::get('historials', 'Historial\HistorialController@index')->name('historials.index');
Route::resource('inventarios', 'Inventario\InventarioController');
Route::get('inventarios/{inventario}/alta', 'Inventario\InventarioController@alta')->name('inventarios.alta');
Route::get('inventarios/{inventario}/baja', 'Inventario\InventarioController@baja')->name('inventarios.baja');
Route::post('inventarios/{inventario}/alta', 'Inventario\InventarioController@darAlta')->name('inventarios.alta.update');
Route::post('inventarios/{inventario}/baja', 'Inventario\InventarioController@darBaja')->name('inventarios.baja.update');
Route::resource('precios', 'Precio\PrecioController', ['except' => 'show', 'destroy']);


// BLUEPRINT PUNTO DE VENTA
Route::get('ventas','Producto\PuntoVentaController@create')->name('ventas.create');
Route::resource('pago', 'Producto\PuntoVentaController');