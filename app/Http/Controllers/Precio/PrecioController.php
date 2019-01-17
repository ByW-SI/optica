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
        $historial = new Historial(['tipo' => 'Alta de Precio', 'descripcion' => 'Precio registrado, $' . $precio->precio]);
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
        $historial = new Historial(['tipo' => 'Modificación de Precio', 'descripcion' => 'Precio cambia a $' . $precio->precio]);
        $precio->producto->historiales()->save($historial);
        return redirect()->route('precios.index');
    }

    public function buscar(Request $request) {
        $query = $request->input('query');
        $min = $request->input('min');
        $max = $request->input('max');
        $productos = Producto::where('sku_interno', 'LIKE', "%$query%")->get();
        $arr = [];
        foreach ($productos as $producto)
            $arr[] = $producto->id;
        $precios = Precio::whereIn('producto_id', $arr);
        if($min != '' && $max != '')
            $precios = $precios->whereBetween('precio', [$min, $max]);
        else if($min != '' && $max == '')
            $precios = $precios->whereBetween('precio', [$min, 1000000]);
        else if($min == '' && $max != '')
            $precios = $precios->whereBetween('precio', [0, $max]);
        $precios = $precios->get();
        return view('precios.busqueda', ['precios' => $precios]);
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
        $arr = [];
        foreach(Precio::get() as $precio)
            $arr[] = $precio->producto->id;
        $productos = $productos->whereNotIn('id', $arr);
        if($seccion != '')
            $productos = $productos->where('seccion', $seccion);
        $productos = $productos->get();
        return view('inventario.busqueda2', ['productos' => $productos]);
    }

}
