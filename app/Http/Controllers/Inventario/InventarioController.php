<?php

namespace App\Http\Controllers\Inventario;

use Illuminate\Http\Request;
use App\Producto;
use App\Inventario;
use App\Historial;
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
        return view("inventario.index", ['inventarios' => $inventarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr = [];
        foreach(Inventario::get() as $inventario)
            $arr[] = $inventario->producto->id;
        $productos = Producto::whereNotIn('id', $arr)->get();
        return view('inventario.create', ['productos' => $productos]);
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
        $inventario = new Inventario(['cantidad' => $request->cantidad]);
        $producto->inventario()->save($inventario);
        $historial = new Historial(['tipo' => 'Alta de Inventario', 'descripcion' => $request->cantidad . ' piezas de ' . $producto->sku_interno . ' registradas.']);
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
        $historial = new Historial(['tipo' => 'Modificación de Inventario', 'descripcion' => 'De ' . $prev . ' a ' . $inventario->cantidad . ' piezas de ' . $inventario->producto->sku_interno . ' (' . $request->cantidad . ' nuevas).']);
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
        $historial = new Historial(['tipo' => 'Baja de Inventario', 'descripcion' => 'De ' . $prev . ' a ' . $inventario->cantidad . ' piezas de ' . $inventario->producto->sku_interno . ' (' . $request->cantidad . ' menos). Por ' . $request->causa . '.']);
        $inventario->producto->historiales()->save($historial);
        return redirect()->route('inventarios.index');
    }

}
