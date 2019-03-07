<?php

namespace App\Http\Controllers\Producto;

use App\Http\Controllers\Controller;
use App\Producto;
use App\Sucursal;
use App\TipoConvenio;
use App\Paciente;
use App\Banco;
use App\Ventas;
use Illuminate\Http\Request;

class PuntoVentaController extends Controller
{
    //
    public function create()
    {
    	$sucursales= Sucursal::get();
    	$tipoconvenios=TipoConvenio::get();
    	$productos=Producto::get();
    	$pacientes = Paciente::get();
    	return view('venta.create',['sucursales'=>$sucursales,'tipoconvenios'=>$tipoconvenios,'productos'=>$productos,'pacientes'=>$pacientes]);
    	// dd($sucursales);
    }

    public function store(Request $request)
    {

    	$bancos = Banco::get();
    	$cantidad = Array();
    	$ventas = new Ventas();
    	$ventas->fecha_venta = $request['fecha'];
    	$ventas->sucursal = $request['sucursal_id'];
    	$ventas->numero_venta = $request['ticket'];
    	$ventas->id_paciente = $request['id'];
    	$ventas->fecha_entrega = $request['fecha_entrega'];
    	$ventas->tipo_convenio = $request['tipo_convenio'];

    	if ($request['tipo_convenio'] === "convenio") {
	    	$ventas->cantidad_tramites = $request['tramites'];
	    	$ventas->numero_autorizacion = $request['autorizacion'];
	    	$ventas->personal = $request['personal'];
	    	$ventas->convenio = $request['convenios_all'];
    		$ventas->monto_convenio = $request['total'] - $request['falta'];
    	}

    	$ventas->subtotal = $request['subtotal'];
    	$ventas->total = $request['total'];
    	$ventas->total_pagar = $request['falta'];
    	$ventas->save();

    	foreach($request['cantidad'] as $c){
    		$cantidad[] = $c;
    	}

    	$prod = $request['producto_id'];
    	$i = 0;
    	foreach ($prod as $prod_id) {
    		$ventas->productos()->attach($prod_id,['cantidad' => $cantidad[$i]]);
    		$i += 1;
    	}
    
    	return view('venta.pagos', ['datos_form' => $ventas, 'bancos' => $bancos]);
    }

    public function guardarVenta(Request $request)
    {
    	$ventas = Ventas::all()->last();

    	$ventas->forma_pago = $request['forma_pago'];
    	if ($request['forma_pago'] === "TC") {
	    	$ventas->num_tarjeta = $request['num_tarjeta'];
	    	$ventas->nombre_dueno_tarjeta = $request['nombre_tarjetaH'];
	    	$ventas->banco = $request['banco_TC'];
	    	$ventas->ultimos_digitos = $request['digitos'];
	    	$ventas->monto_pagar = $request['monto_pagar_TC'];
	    	$ventas->saldo = $request['saldo_TC'];
	    	$ventas->numero_referencia = $request['num_ref'];
    	}
    	else if($request['forma_pago'] === "transferencia"){
    		$ventas->numero_referencia = $request['referencia'];
	    	$ventas->fecha_deposito = $request['fecha_deposito'];
	    	$ventas->banco = $request['banco_TRANS'];
	    	$ventas->saldo = $request['saldo_TRANS'];
	    	$ventas->monto_pagar = $request['monto_pagar_TRANS'];
    	}
    	else{
	    	$ventas->monto_pagar = $request['monto_pagar_EF'];
	    	$ventas->saldo = $request['saldo_EF'];
    	}
    	
    	$ventas->save();

    	return view('venta.ordenCompra', ['datos' => $ventas]);
    }

    public function guardarOrdenTrabajo(Request $request)
    {
    	$productos = Array();
    	foreach ($request->productos as $producto) {
    		$productos[] = explode(",", $producto);
    	}
    	for ($i=0; $i < count($productos); $i++) { 
    		$productos[$i] = str_replace(["\"", "[", "]"], "", $productos[$i]);
    	}
    	return response()->json(['respuesta' => $productos], 200);
    }
}
