<?php

namespace App\Http\Controllers\Producto;

use App\Http\Controllers\Controller;
use App\Producto;
use App\Sucursal;
use App\TipoConvenio;
use App\Paciente;
use App\Banco;
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
    	$productos = Array();
    	$cantidad = Array();
    	foreach($request['producto_id'] as $p){
    		$productos[] = $p;
    	}
    	foreach($request['cantidad'] as $c){
    		$cantidad[] = $c;
    	}
    
    	return view('venta.pagos', ['datos_form' => $request->all(), 'bancos' => $bancos, 'productos' => $productos, 'cantidad' => $cantidad]);
    }

    public function guardarVenta(Request $request)
    {
    	$datos = $request->all();
    	$productos = Array();
    	$cantidad = Array();
    	foreach ($request['productos_id'] as $id) {
    		$productos[] = Producto::find($id);
    	}
    	foreach ($request['cantidad'] as $c) {
    		$cantidad[] = $c;
    	}

    	return view('venta.ordenCompra', ['datos' => $datos, 'productos' => $productos, 'cantidad' => $cantidad]);
    }
}
