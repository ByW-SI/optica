<?php

namespace App\Http\Controllers\Producto;

use App\Http\Controllers\Controller;
use App\Producto;
use App\Sucursal;
use App\TipoConvenio;
use App\Paciente;
use App\Banco;
use App\Ventas;
use App\OrdenTrabajo;
use Illuminate\Http\Request;
use Milon\Barcode\DNS1D;
use Barryvdh\DomPDF\Facade as PDF;
use UxWeb\SweetAlert\SweetAlert as Alert;

class PuntoVentaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventas = Ventas::all();
        return view('venta.index', ['ventas' => $ventas]);
    }

    //
    public function create()
    {
    	$sucursales= Sucursal::get();
    	$tipoconvenios=TipoConvenio::get();
    	$productos=Producto::get();
    	$pacientes = Paciente::get();
        $ventas = Ventas::all()->last();
        if (isset($ventas)) {
            return view('venta.create',['sucursales'=>$sucursales,'tipoconvenios'=>$tipoconvenios,'productos'=>$productos,'pacientes'=>$pacientes, 'num_venta' => $ventas->numero_venta]);
        }
        else{
            return view('venta.create',['sucursales'=>$sucursales,'tipoconvenios'=>$tipoconvenios,'productos'=>$productos,'pacientes'=>$pacientes, 'num_venta' => $sucursales->claveid.'000000']);
        }
    	
    	// dd($sucursales);
    }

    public function store(Request $request)
    {
    	$Venta_guardada = Ventas::where('numero_venta', $request['ticket'])->first();
    	$bancos = Banco::get();

    	if (isset($Venta_guardada->id)) {
    		return view('venta.pagos', ['datos_form' => $Venta_guardada, 'bancos' => $bancos]);
    	}

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

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Ventas $venta, $id)
    {
        $venta = Ventas::find($id);
        $paciente = Paciente::where('identificador', $venta->id_paciente)->first();
        return view('venta.view', ['venta' => $venta, 'paciente' => $paciente]);
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

    	return view('venta.ordenTrabajo', ['datos' => $ventas]);
    }

    public function guardarOrdenTrabajo(Request $request)
    {
    	$ordenTrabajo = new OrdenTrabajo();
    	$ordenTrabajo->fecha_entrega = $request['fecha_entrega'];
    	$ordenTrabajo->fecha_generacion = $request['fecha_generacion'];
        $ordenTrabajo->ventas_id = $request['id_venta'];
    	$ordenTrabajo->save();

    	$productos = $request['sel'];
    	$cantidad = $request['cantidad'];
    	$descuentos = $request['descuento'];
    	$i = 0;
        if (isset($productos)) {
            foreach ($productos as $prod) {
                $ordenTrabajo->productos()->attach($prod, ['cantidad' => $cantidad[$i], 'descuento' => $descuentos[$i]]);
                $i += 1;
            }
            Alert::success("La orden se genero con éxito")->persistent("Cerrar");
            return redirect()->route('ventas.create');
        }

    	Alert::success("La venta se guardo con éxito")->persistent("Cerrar");
    	return redirect()->route('ventas.create');

    }

    public function buscarProducto(Request $request) {
    	$precios = Array();
        $query = $request->input('query');
        $seccion = $request->input('seccion');
        $wordsquery = explode(' ', $query);
        $productos = Producto::where(function($q) use($wordsquery) {
            foreach ($wordsquery as $word) {
                $q->orWhere('sku_interno', 'LIKE', "%$word%")
                  ->orWhere('descripcion', 'LIKE', "%$word%")
                  ->orWhere('sku', 'LIKE', "%$word%");
            }
        });
        $productos = $productos->get();
        foreach ($productos as $producto) {
        	$precios[] = $producto->precio['precio'];
        }

        return response(['productos' => $productos, 'precios' => $precios], 200);
    }

    public function buscarVentas(Request $request) {
        $desde = $request->input('desde') ? $request->input('desde') : date('Y-m-d');
        $hasta = $request->input('hasta') ? $request->input('hasta') : '9999-12-31';
        $query = $request->input('query');
        $ventas = Ventas::whereBetween('fecha_venta', [$desde, $hasta]);
        if($query) {
            $sucursales = Sucursal::where('claveid','LIKE',"%$query%")->get();
            $arrs = [];
            foreach ($sucursales as $sucursal)
                $arrs[] = $sucursal->claveid;
            $ventas = $ventas->whereIn('sucursal', $arrs);
        }

        $ventas = $ventas->get();
        return view('venta.busqueda', ['ventas' => $ventas]);
    }

    public function pdf(){
         $ventas = Ventas::all()->last();
         $sucursal = Sucursal::where('claveid', $ventas->sucursal)->first();
         $paciente = Paciente::where('identificador', $ventas->id_paciente)->first();
         $barra = new DNS1D();
         $barra = $barra->getBarcodeHTML($ventas->id, "EAN13");
         $pdf = PDF::loadView('venta.ticket', ['ventas' => $ventas, 'sucursal' => $sucursal, 'paciente' => $paciente, 'barra' => $barra]);
         return $pdf->download('ticket.pdf');
    }
}
