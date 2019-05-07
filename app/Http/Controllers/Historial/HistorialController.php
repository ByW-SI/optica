<?php

namespace App\Http\Controllers\Historial;

use App\Historial;
use App\Producto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HistorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historiales = Historial::get();
        $productos = Producto::get();
        return view('historial.index', ['historiales' => $historiales, 'productos' => $productos]);
    }

    public function buscar(Request $request) {
        $query = $request->input('query');
        $productos = Producto::where('sku_interno', 'LIKE', "%$query%")->get();
        $arr = [];
        foreach($productos as $producto)
            $arr[] = $producto->id;
        $historiales = Historial::where('id', $arr)->get();
        return view('historial.busqueda', ['historiales' => $historiales, 'productos' => $productos]);
    }

}
