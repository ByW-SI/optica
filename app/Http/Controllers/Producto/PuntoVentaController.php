<?php

namespace App\Http\Controllers\Producto;

use App\Http\Controllers\Controller;
use App\Producto;
use App\Sucursal;
use App\TipoConvenio;
use Illuminate\Http\Request;

class PuntoVentaController extends Controller
{
    //
    public function create()
    {
    	$sucursales= Sucursal::get();
    	$tipoconvenios=TipoConvenio::get();
    	$productos=Producto::get();
    	return view('venta.create',['sucursales'=>$sucursales,'tipoconvenios'=>$tipoconvenios,'productos'=>$productos]);
    	// dd($sucursales);
    }
}
