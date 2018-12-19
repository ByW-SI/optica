<?php

namespace App\Http\Controllers\Inventario;

use Illuminate\Http\Request;
use App\Producto;
use App\Inventario;
use App\Historial;
use App\Sucursal;
use App\Http\Controllers\Controller;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventarios = Inventario::get();
        $sucursales = Sucursal::get();
        return view("inventario.index", ['inventarios' => $inventarios, 'sucursales' => $sucursales]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = Producto::get();
        $sucursales = Sucursal::get();
        return view('inventario.create', ['productos' => $productos, 'sucursales' => $sucursales]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = Producto::find($request->producto_id);
        $inventario = new Inventario(['cantidad' => $request->cantidad, 'sucursal_id' => $request->sucursal_id, 'num_compra' => $request->num_compra, 'codigo' => $request->codigo]);
        $producto->inventario()->save($inventario);
        $historial = new Historial(['tipo' => 'Creación de inventario', 'descripcion' => $request->cantidad . ' piezas registradas.' . ($request->codigo ? ' Código: ' . $request->codigo . '.' : '') . ($request->num_compra ? ' Número de compra: ' . $request->num_compra . '.' : '')]);
        $producto->historiales()->save($historial);
        return redirect()->route('inventarios.index');
    }

    public function alta(Inventario $inventario) {
        return view('inventario.alta', ['inventario' => $inventario]);
    }

    public function darAlta(Request $request, Inventario $inventario) {
        $prev = $inventario->cantidad;
        $inventario->cantidad += $request->cantidad;
        $inventario->save();
        $historial = new Historial(['tipo' => 'Modificación de Inventario', 'descripcion' => 'De ' . $prev . ' a ' . $inventario->cantidad . ' piezas (' . $request->cantidad . ' nuevas).']);
        $inventario->producto->historiales()->save($historial);
        return redirect()->route('inventarios.index');
    }

    public function baja(Inventario $inventario) {
        return view('inventario.baja', ['inventario' => $inventario]);
    }

    public function darBaja(Request $request, Inventario $inventario) {
        $prev = $inventario->cantidad;
        $inventario->cantidad -= $request->cantidad;
        $inventario->save();
        $str = $request->descripcion . '.';
        switch($request->causa) {
            case 'Robo':
                $str .= ' Ladrón: ' . $request->ladron . '. ' . ($request->denuncia == 'Sí' ? 'Fue denunciado' : 'No fue denunciado') . '.';
                break;
            case 'Donación':
                $str .= ' Receptor: ' . $request->receptor . '. Autorizó: ' . $request->autorizo . '.';
                break;
            case 'Garantía':
                $str .= ' Código: ' . $request->codigo . '.';
                break;
            default:
                break;
        }
        $historial = new Historial(['tipo' => 'Baja de Inventario', 'descripcion' => 'De ' . $prev . ' a ' . $inventario->cantidad . ' piezas (' . $request->cantidad . ' menos). Por ' . $request->causa . '. ' . $str]);
        $inventario->producto->historiales()->save($historial);
        return redirect()->route('inventarios.index');
    }

    public function buscar(Request $request) {
        $query = $request->input('query');
        $sucursal = $request->input('sucursal');
        $productos = Producto::where('sku_interno', 'LIKE', "%$query%")->get();
        $arr = [];
        foreach ($productos as $producto)
            $arr[] = $producto->id;
        $inventarios = Inventario::whereIn('producto_id', $arr);
        if($sucursal != '') {
            $inventarios = $inventarios->where('sucursal_id', $sucursal);
        }
        $inventarios = $inventarios->get();
        return view('inventario.busqueda', ['inventarios' => $inventarios]);
    }

    public function buscar2(Request $request) {
        $query = $request->input('query');
        $seccion = $request->input('seccion');
        $wordsquery = explode(' ', $query);
        $productos = Producto::where(function($q) use($wordsquery) {
            foreach ($wordsquery as $word) {
                $q->orWhere('sku_interno', 'LIKE', "%$word%")
                  ->orWhere('descripcion', 'LIKE', "%$word%");
            }
        });
        if($seccion != '')
            $productos = $productos->where('seccion', $seccion);
        $productos = $productos->get();
        return view('inventario.busqueda2', ['productos' => $productos]);
    }

}
