<?php

namespace App\Http\Controllers\Precio;

use App\Precio;
use App\Producto;
use App\Historial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrecioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $precios = Precio::get();
        return view('precios.index', ['precios' => $precios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr = [];
        foreach(Precio::get() as $precio)
            $arr[] = $precio->producto->id;
        $productos = Producto::whereNotIn('id', $arr)->get();
        return view('precios.create', ['productos' => $productos]);
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
        $precio = new Precio(['precio' => $request->precio]);
        $producto->precio()->save($precio);
        $historial = new Historial(['tipo' => 'Alta de Precio', 'descripcion' => 'Precio de ' . $producto->sku_interno . ' registrado, $' . $precio->precio]);
        $producto->historiales()->save($historial);
        return redirect()->route('precios.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Precio $precio)
    {
        return view('precios.edit', ['precio' => $precio]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Precio $precio)
    {
        $precio->precio = $request->precio;
        $precio->save();
        $historial = new Historial(['tipo' => 'Modificación de Precio', 'descripcion' => 'Precio de ' . $precio->producto->sku_interno . ' cambia a $' . $precio->precio]);
        $precio->producto->historiales()->save($historial);
        return redirect()->route('precios.index');
    }

}
