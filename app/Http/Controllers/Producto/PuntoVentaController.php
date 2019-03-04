<?php

namespace App\Http\Controllers\Producto;

use App\Http\Controllers\Controller;
use App\Producto;
use App\Sucursal;
use App\TipoConvenio;
use App\Paciente;
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
    	$falta = $request->falta;
    	return view('venta.pagos', ['datos_form' => $request->all()]);
    }
}
